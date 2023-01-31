<!DOCTYPE html>
<html lang="en">
<style> 
    
</style>
<head>
    <!-- Title -->
    <title>Send Message</title>
        
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes"/>-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"›  

    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css"> <!-- These links (FontAwesome & Goggle) are used for Icons --> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>     
    

</head>
<body>
    <div class="wrapper">
        <header>Send us a message</header>
        <form action="#">
            <div class="dbl-field">
                <div class="field">
                    <input type="text" name="name" placeholder="Enter your name">
                    <i class="fas fa-user"></i>
                </div>
                <div class="field">
                    <input type="text" name="email" placeholder="Enter your email">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
            <div class="dbl-field">
                <div class="field">
                    <input type="text" name="phone" placeholder="Enter your phone">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="field">
                    <input type="text" name="website" placeholder="Enter your website">
                    <i class="fas fa-globe"></i>
                </div>
            </div>
            <div class="message">
                <textarea name="message" placeholder="Write your message"></textarea>
                <i class="material-icons">message</i>
            </div>
            <div class="button-area">
                <button type="submit">Send Message</button>
                <span>Sending your message...</span>
            </div>
        </form>
    </div>

    <script src="script.js"></script>

</body>
</html>