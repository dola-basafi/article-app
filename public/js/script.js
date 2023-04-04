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
const baseUrl = "http://localhost:8000/api";
//deploy
// const baseUrl = "https://article-production-bdcd.up.railway.app/api";

//logout
function proccesslogout() {
    const token = localStorage.getItem("access_token");
    $.ajax({
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
        },
        url: `${baseUrl}/user/logout`,
        // headers: { access_token: localStorage.token },
    }).done((result) => {
        console.log(result, "INI hasil response dengan ajax logout");
        localStorage.clear();
        // afterLogin()
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
            console.log(result, "INI hasil response dengan ajax regis");
            // afterLogin()
        })
        .fail((err) => {
            const errors = err.responseJSON.error;
            $("#alert-login").show();
            $("#alert-login").text(JSON.stringify(errors));
            console.log(errors, "INI ERROR DI regis");
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
            console.log("tet");
            // console.log(
            //     result.access_token,
            //     "INI hasil response dengan ajax login"
            // );
            // localStorage.setItem("access_token", result.access_token);
        })
        .fail((err) => {
            console.log(email);

            const errors = err.responseJSON.error;
            $("#alert-login").show();
            $("#alert-login").text(JSON.stringify(errors));
            console.log(errors, "INI ERROR DI LOGIN");
        });
}

function showCategory() {
    $.ajax({
        method: "GET",
        url: `${baseUrl}/article-category/list`,
        // headers: { access_token: localStorage.token },
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
        // category.messages.forEach();
    });
}
function isLogin() {
    if (localStorage.getItem("access_token")) {
        $(".auth").show();
    } else {
        $(".auth").hide();
    }
}
