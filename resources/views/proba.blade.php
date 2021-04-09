@extends('layouts.app')

localstorage
<div id="div5">

</div>


<button type="button" id="dugme">Unesi</button>

<script>

    let array = [
        {
            name: "Laki",
            age: 56
        },

        {
            name: "Dule",
            age: 29
        }
    ];

    array.push({
        name: "Djuki",
        age: 23
    });

    array.push({
        name: "Miki",
        age: 57
    });




    localStorage.setItem("items", JSON.stringify(array));

    const data = localStorage.getItem("items");
    const data_object = JSON.parse(data);

    console.log(data_object);


    window.onload = (event) => {
        event.preventDefault();

        console.log('page is fully loaded');
        $('#div5').append(`<p>Broj itemsa: ${data_object.length}</p>`);
        for( let i = 0; i < data_object.length; i++){
            console.log(data_object[i].name)



            $('#div5').append(`
            <div>
                <p>Ime: ${data_object[i].name} </p>
                <p>Godine: ${data_object[i].age} </p>

            </div>


            `);


        }
    }


         // $('div').append(`${data_object}`);



    // for (let i = 0; i < localStorage.length; i++) {
    //     console.log(localStorage.name)
    // }

</script>



<form action="/examples/actions/confirmation.php" class="needs-validation" method="post" novalidate>
    <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="Email" required>
        <div class="invalid-feedback">Please enter a valid email address.</div>
    </div>
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
        <div class="invalid-feedback">Please enter your password to continue.</div>
    </div>
    <div class="form-group">
        <label class="form-check-label"><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
</form>
