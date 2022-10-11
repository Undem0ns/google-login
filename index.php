<html lang="en">

<body>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <div id="g_id_onload" data-client_id="927679325793-nr98rvaq74vjvipp6gl5b3g9h4jeo7g4" data-callback="onSignIn">
    </div>
    <div class="g_id_signin" data-type="standard"></div>

    <script>
    const axios = require('axios');

    function onSignIn(googleUser) {
        console.log(googleUser)
        axios.get('http://localhost:3000/api/v1/user')
            .then(function(response) {
                // handle success
                console.log(response);
            })
            .catch(function(error) {
                // handle error
                console.log(error);
            })
            .then(function() {
                // always executed
            });
    }
    </script>
</body>

</html>