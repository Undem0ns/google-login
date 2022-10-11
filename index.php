<html lang="en">

<body>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <div id="g_id_onload" data-client_id="927679325793-nr98rvaq74vjvipp6gl5b3g9h4jeo7g4" data-callback="onSignIn">
    </div>
    <div class="g_id_signin" data-type="standard"></div>

    <script>
    const axios = require('axios');

    async function onSignIn(googleUser) {
        console.log(googleUser)
        const res = await axis.get('http://localhost:3000/api/v1/user')
        console.log(res)
    }
    </script>
</body>

</html>