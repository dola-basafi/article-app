$(document).ready(function () {
    $("#alert-login").hide();
    if (localStorage.getItem("access_token")) {
        $("#log-out").show();
        $("#log").hide();
        $("#reg").hide();
    } else {
        $("#log-out").hide();
        $("#log").show();
        $("#reg").show();
    }
});
//local
const baseUrl = "http://127.0.0.1:8000/api";
//deploy
// const baseUrl = "https://article-production-bdcd.up.railway.app/api";

//logout
function proccesslogout() {
    const token = localStorage.getItem("access_token");
    $.ajax({
        method: "GET",
        headers: {
            Authorization: `Bearer ${token}`,
        },
        url: `${baseUrl}/user/logout`,
    }).done((result) => {
        console.log(result, "succes logout");
        localStorage.clear();
        location.reload();
    });
}
//register
function proccessregister(e) {
    e.preventDefault();
    const email = $("#regemail").val();
    const name = $("#name").val();
    const password = $("#regpassword").val();

    $.ajax({
        method: "POST",
        url: `${baseUrl}/user/register`,
        data: { email: email, password: password, name: name },
    })
        .done((result) => {
            console.log(result, "success regis");
            location.reload();
        })
        .fail((err) => {
            const errors = err.responseJSON.error;
            $("#alert-regis").show();
            $("#alert-regis").text(JSON.stringify(errors));
            console.log(err, "this error from regis");
        });
}

// login
function proccesslogin(e) {
    e.preventDefault();    
    const email = $("#loginemail").val();
    const password = $("#loginpassword").val();
    $.ajax({
        method: "POST",
        url: `${baseUrl}/user/login`,        
        data: { email: email, password: password },
    })
        .done((result) => {
            console.log(
                result.access_token,
                "success login"
            );
            localStorage.setItem("access_token", result.access_token);
            $("#form-login").empty()
            location.reload();
        })
        .fail((err) => {
            const errors = err.responseJSON;
            $("#alert-login").show();
            $("#alert-login").text(JSON.stringify(errors));
            console.log(errors, "error login");
        });
}
//create category
function createCategory(e) {
    e.preventDefault()
    const token = localStorage.getItem("access_token");
    const categoryname = $("#categoryname").val()
    $.ajax({
        method: "POST",      
        url: `${baseUrl}/article-category/create`,
        data: { categoryname: categoryname },
        headers: {
            Authorization: `Bearer ${token}`,
        },
    }).done((result)=>{
        console.log(result)
        // window.location = "/category/show"
    })
    .fail((err)=>{
        const errors = err.responseJSON.messages
        $("#alert-createcategory").show()
        $("#alert-createcategory").text(JSON.stringify(errors))
        console.log(errors)
    })
}



//show category
function showCategory() {
    $.ajax({
        method: "GET",
        url: `${baseUrl}/article-category/list`,
    }).done((categories) => {
        let data = categories.messages;
        $.each(data, (index, category) => {
            $("#category-data").append(
                `
        <tr>
                <th scope="row">${index + 1}</th>
                <td>${category.categoryname}</td>
                <td>
                      <button class="btn btn-primary">detail</button>
                      <button class="btn btn-warning auth">update</button>
                      <button class="btn btn-danger auth">delete</button>
                    </td>
        </tr>
        `
            );
        });
        isLogin();
    });
}
function isLogin() {
    if (localStorage.getItem("access_token")) {
        $(".auth").show();
    } else {
        $(".auth").hide();
    }
}
function clearAlert(){
    $(".err").hide()
    $(".err").empty()
}
