<html lang="en">

<body>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <div id="g_id_onload" data-client_id="927679325793-nr98rvaq74vjvipp6gl5b3g9h4jeo7g4" data-callback="onSignIn">
    </div>
    <div class="g_id_signin" data-type="standard"></div>

    <script>
    function onSignIn(googleUser) {
        console.log(123)
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
    }

    function bindGpLoginBtn() {
        gapi.load('auth2', function() {
            auth2 = gapi.auth2.init({
                client_id: '927679325793-nr98rvaq74vjvipp6gl5b3g9h4jeo7g4',
                scope: 'profile email'
            });
            attachSignin(document.getElementById('gp-login-btn'));
        });
    }

    function attachSignin(element) {
        auth2.attachClickHandler(element, {},
            function(googleUser) {
                console.log('Success')
                // Success
                getCurrentGpUserInfo(googleUser);
            },
            function(error) {
                // Error
                console.log(JSON.stringify(error, undefined, 2));
            }
        );
    }

    function getCurrentGpUserInfo(userInfo) {
        var result = '';

        // Useful data for your client-side scripts:
        var profile = userInfo.getBasicProfile();

        result += "ID: " + profile.getId() + "\n";
        result += "Full Name:  " + profile.getName() + "\n";
        result += "Given Name: " + profile.getGivenName() + "\n";
        result += "Family Name: " + profile.getFamilyName() + "\n";
        result += "Email: " + profile.getEmail() + "\n";
        result += "ID Token: " + userInfo.getAuthResponse().id_token + "\n";

        document.getElementById("result").value = result;
    }
    </script>
</body>

</html>