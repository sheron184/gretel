# Gretel

## A lightweight PHP web framework

### Quickstart

Clone the repository

```
cd gretel
```

Start the server

`php gretel`

Run on a different port

`php gretel --port=4000`

This will start a php server in your machine.


### Add routes

Adding routes is simple!

You can add routes in app/routes.php file. Your web routes should be added in $web array. ($API routes are not implemented yet). $routes array is in key value pairs as key you can enter the path (route) and as the value you should add your controller and the method name.

```
$web = [
    '/' => [\App\Controllers\WelcomeController::class, 'index'],
];
```

When you visit your domain (localhost:8000) you will be running index function WelcomeContoller. You can add any amount of routes.

### Loading views

You can use view function to load php files as views in your web app. Including passing variables as well. Views must added in app/Views directory. You can load views by the file name as shown below.

app/Controllers/WelcomeController

```
public function index($request){
        $name = "Hakuna Matata!!";
        $this->view('index', array('name' => $name));
}
```

app/Views/index.php

```
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href=""
      rel="stylesheet"
    />
    <title>Home</title>
  </head>
  <body>
    <h2>Hello!</h2>
    <p><?php echo $name ?></p>
  </body>
</html>

```

Awesome! You continue building the application. The project is under development and new stuff will be added soon. Feel free to contribute.
