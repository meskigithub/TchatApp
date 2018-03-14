<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Tchat</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

<div class="container">
    <div class="row" style='margin-top:150px'>
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">BIENVENU SUR TCHATAPP</h1>
            <div class="account-wall">
                <form id="form-signin" class="form-signin" action="tchat.php" method="post" name="signin">
                <input name='pseudo' type="text" class="form-control" placeholder="pseudo" required autofocus>
                <input name='password' type="password" class="form-control" placeholder="Mot de passe" required>
                <input name='chatter' value='chatter' class="btn btn-lg btn-primary btn-block" type="submit" >
                    
                </form>
            </div>
        </div>
    </div>
</div>
    </body>
</html>
