const userName = document.getElementById('userName');
const pass = document.getElementById('pass');
const roles = document.getElementById('roles');
let details = document.getElementById('details');
const resInfo = document.getElementById('resInfo');
const userData = document.getElementById('userData');

const addUser = async() => { // function addUser(){}
    // console.log(userName.value + " " + pass.value + " " + roles.value);
    const data = {
        userName: userName.value,
        pass: pass.value,
        roles: roles.value
    };
    await fetch('../admin/addUser.php', {
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then((data) => {
            console.log('Success:', data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    userData.reset();
}
const userDetails = async() => {
    const res = await fetch('../admin/userDetails.php');
    const received_data = await res.json();
    details.innerHTML = '';
    console.log(received_data);
    received_data.forEach(user => {
        details.innerHTML += `<tr class='table'>
            <td id="userName${user.id}">${user.userName}</td>
            <td id="pass${user.id}">${user.pass}</td>
            <td id="roles${user.id}">${user.roles}</td>
            <td>
            <button class='btn btn-warning' id='dataUser${user.id}' onclick='dataUser(${user.id})'>Edit</button>
            <button class='btn btn-danger d-none' id='editUser${user.id}' onclick='editUser(${user.id})'>Save</button>
            <button class='btn btn-warning' onclick='del(${user.id})'>Delete</button>
            </td>
            </tr>`;
    });
}


function del(id) {
    fetch('../admin/delete.php', {
        method: 'POST',
        body: JSON.stringify({
            id: id
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    }).then((response) => {
        return response.json();
    }).then((res) => {
        console.log(res);
        userDetails();
    }).catch(error => {
        console.log(error);
    });
}

// update
const dataUser = (id) => {
    userName.value = document.getElementById(`userName${id}`).innerHTML;
    pass.value = document.getElementById(`pass${id}`).innerHTML;
    roles.value = document.getElementById(`roles${id}`).innerHTML;
    document.getElementById(`dataUser${id}`).classList.add('d-none');
    document.getElementById(`editUser${id}`).classList.remove('d-none');
}
const editUser = (id) => {
    fetch('../admin/editUser.php', {
        method: 'POST',
        body: JSON.stringify({
            id: id,
            userName: userName.value,
            pass: pass.value,
            roles: roles.value
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    }).then((response) => {
        return response.json();
    }).then((res) => {
        console.log(res);
        userDetails();
    }).catch(function(error) {
        console.log('Something went wrong.', error);
    });
    userData.reset();
}
document.getElementById('addUser').addEventListener('click', addUser);
document.getElementById('userDetails').addEventListener('click', userDetails);