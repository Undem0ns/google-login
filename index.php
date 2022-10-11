<html lang="en">

<head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id"
        content="927679325793-nr98rvaq74vjvipp6gl5b3g9h4jeo7g4.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>

<body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <button id="gp-login-btn">Sign in with Google</button>
    <br>
    Result: <textarea id="result"></textarea>

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
                client_id: 'YOUR_CLIENT_ID',
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