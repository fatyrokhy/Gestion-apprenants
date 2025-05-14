<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - École 221</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="h-screen w-screen">
        <img src="../assets/images/conexion1.png" alt="" class="absolute inset-0 object-cover w-full h-full  z-0" srcset="">
        <div class=" p-8 rounded-lg shadow-md w-full max-w-sm absolute z-5 h-[60vh] top-30 mx-auto left-[76vh] bg-[#DF8C07]"></div>
        <div class=" p-8 rounded-lg shadow-md w-full max-w-sm absolute z-5 h-[60vh] top-28 left-[77vh]  bg-[#D70C0C]"></div>
         <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-sm  z-10 relative mx-auto mt-28   ">
        <h1 class="text-xl font-semibold  text-gray-800 mb-2">Bienvenue à l'école 221</h1>
        <h2 class="text-2xl font-bold  text-gray-700 mb-6">Se Connecter</h2>

        <form class="space-y-4" method="POST">
        <input type="hidden" id="" class="" name="controller" value="security">
        <input type="hidden" id="" class="" name="page" value="connexion">
        <div class="mt-1 text-red-500 text-sm  peer-invalid:block"><?= $errors['global'] ?? '' ?></div>
        <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Entrez votre téléphone ou votre email</label>
                <input type="text" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div class="mt-1 text-red-500 text-sm  peer-invalid:block"><?= $errors['email'] ?? '' ?></div>
                </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Entrez votre mot de passe</label>
                <input type="password" id="password" name="pass"  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div class="mt-1 text-red-500 text-sm  peer-invalid:block"><?= $errors['pass'] ?? '' ?></div>
                </div>

            <div class="flex justify-between items-center">
                <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Mot de passe oublié</a>
            </div>

            <button type="submit" name="add" class="w-full bg-[#D70C0C] text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Se connecter
            </button>
        </form>
    </div>
</div>
</body>
</html>