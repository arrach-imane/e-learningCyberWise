<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberWise - Plateforme d'apprentissage en ligne</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow-sm">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo et Nom -->
                <div class="flex items-center space-x-2">
                    <a href="/" class="text-2xl font-bold text-blue-600 hover:text-blue-700 transition-colors">
                        CyberWise
                    </a>
                </div>

                <!-- Navigation principale -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-600 hover:text-blue-600 transition-colors">Accueil</a>
                    <a href="/cours" class="text-gray-600 hover:text-blue-600 transition-colors">Cours</a>
                    <a href="/formations" class="text-gray-600 hover:text-blue-600 transition-colors">Formations</a>
                    <a href="/contact" class="text-gray-600 hover:text-blue-600 transition-colors">Contact</a>
                </div>

                <!-- Boutons de connexion -->
                <div class="flex items-center space-x-4">
                    <a href="/login" class="text-gray-600 hover:text-blue-600 transition-colors">Connexion</a>
                    <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                        S'inscrire
                    </a>
                </div>

                <!-- Menu mobile -->
                <button class="md:hidden text-gray-600 hover:text-blue-600 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </nav>
    </header>

    <!-- Menu mobile (caché par défaut) -->
    <div class="md:hidden hidden bg-white shadow-lg">
        <div class="px-4 py-2 space-y-2">
            <a href="/" class="block text-gray-600 hover:text-blue-600 transition-colors">Accueil</a>
            <a href="/cours" class="block text-gray-600 hover:text-blue-600 transition-colors">Cours</a>
            <a href="/formations" class="block text-gray-600 hover:text-blue-600 transition-colors">Formations</a>
            <a href="/contact" class="block text-gray-600 hover:text-blue-600 transition-colors">Contact</a>
        </div>
    </div>
</body>
</html>
