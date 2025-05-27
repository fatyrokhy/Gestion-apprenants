<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION APPRENANTS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 font-serif  overflow-x-hidden">
    <div class="flex min-h-screen items-start">
        <!-- Sidebar -->
        <div id="sidebar"
            class="w-52 fixed left-0 top-0 min-h-screen bg-white  text-gray-700 p-6 rounded-xl flex flex-col justify-between">
            <img src="./assets/images/image copy.png" class="w-24 h-24 rounded place-self-center" alt="" srcset="">
            <?php if (getUser()["role"] == 'ADMIN'): ?>
                <ul class="space-y-4 mb-12">
                    <li>
                        <a href="<?= PAGE ?>controller=promo&page=dashboard" class="sidebar-link flex items-center space-x-2 
                 <?= ($_GET['page'] == 'dashboard') ? 'bg-gray-200 bg-opacity-25 p-2  hover:text-white rounded-lg' : '' ?>" data-page="dashboard">
                            <i class="ri-dashboard-line text-xl"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= PAGE ?>controller=ref&page=ref" class="sidebar-link flex items-center space-x-2 
                <?= ($_GET['page'] == 'ref') ? 'bg-white bg-opacity-25 p-2  hover:text-white rounded-lg' : '' ?>" data-page="classe">
                            <i class="ri-building-2-line text-xl"></i>
                            <span>Référentiel</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= PAGE ?>controller=prof&page=prof" class="sidebar-link flex items-center space-x-2 
                <?= ($_GET['page'] == 'prof') ? 'bg-white bg-opacity-25 p-2  hover:text-white rounded-lg' : '' ?>" data-page="prof">
                            <i class="ri-user-line text-xl"></i>
                            <span>Proffesseurs</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= PAGE ?>controller=rpController&page=coursPlannifier" class="sidebar-link flex items-center space-x-2 
                <?= ($_GET['page'] == 'coursPlannifier') ? 'bg-white bg-opacity-25 p-2  hover:text-white rounded-lg' : '' ?>" data-page="cours">
                            <i class="ri-school-line"></i>
                            <span>Cours</span>
                        </a>
                    </li>
                </ul>
            <?php elseif (getUser()["role"] == 'etudiant'): ?>
                <ul class="space-y-4 mb-12">
                    <li>
                        <a href="<?= PAGE ?>controller=etudiant&page=coursEtudiant" class="sidebar-link flex items-center space-x-2 
                 <?= ($_GET['page'] == 'coursEtudiant') ? 'bg-white bg-opacity-25 p-2  hover:text-white rounded-lg' : '' ?>" data-page="dashboard">
                            <i class="ri-dashboard-line text-xl"></i>
                            <span>Mes cours</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= PAGE ?>controller=etudiant&page=absenceEtudiant" class="sidebar-link flex items-center space-x-2 
                <?= ($_GET['page'] == 'absenceEtudiant') ? 'bg-white bg-opacity-25 p-2  hover:text-white rounded-lg' : '' ?>" data-page="classe">
                            <i class="ri-building-2-line text-xl"></i>
                            <span>Mes absences</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= PAGE ?>controller=etudiant&page=justifyAbsence" class="sidebar-link flex items-center space-x-2 
                <?= ($_GET['page'] == 'justifyAbsence') ? 'bg-white bg-opacity-25 p-2  hover:text-white rounded-lg' : '' ?>" data-page="proff">
                            <i class="ri-user-add-line text-xl"></i>
                            <span>Justificatifs</span>
                        </a>
                    </li>
                </ul>
            <?php elseif (getUser()["role"] == 'attache'): ?>
                <ul class="space-y-4 mb-12">
                    <li>
                        <a href="<?= PAGE ?>controller=inscrit&page=listeInscrits" class="sidebar-link flex items-center space-x-2 
                 <?= ($_GET['page'] == 'listeInscrits') ? 'bg-white bg-opacity-25 p-2  hover:text-white rounded-lg' : '' ?>" data-page="dashboard">
                            <i class="ri-user-line text-xl"></i>
                            <span>Inscrits</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= PAGE ?>controller=absence&page=absence" class="sidebar-link flex items-center space-x-2 
                <?= ($_GET['page'] == 'absence') ? 'bg-white bg-opacity-25 p-2  hover:text-white rounded-lg' : '' ?>" data-page="classe">
                            <i class="ri-calendar-close-line text-xl"></i>
                            <span>Absences</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= PAGE ?>controller=justify&page=justify" class="sidebar-link flex items-center space-x-2 
                <?= ($_GET['page'] == 'justify') ? 'bg-white bg-opacity-25 p-2  hover:text-white rounded-lg' : '' ?>" data-page="proff">
                            <i class="ri-file-text-line text-xl"></i>
                            <span>Justifications</span>
                        </a>
                    </li>
                </ul>
                <?php elseif (getUser()["role"] == 'professeur'): ?>
                <ul class="space-y-4 mb-12">
                    <li>
                        <a href="<?= PAGE ?>controller=cours&page=mesCours" class="sidebar-link flex items-center space-x-2 
                 <?= ($_GET['page'] == 'mesCours') ? 'bg-white bg-opacity-25 p-2  hover:text-white rounded-lg' : '' ?>" data-page="dashboard">
                            <i class="ri-dashboard-line text-xl"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                </ul>
                <?php endif ?>

            <button class="text-gray-700 hover:text-gray-200 flex items-center space-x-2 ">
                <a href="<?= PAGE ?>controller=security&page=deconnexion">
                    <i class="ri-logout-box-r-line text-xl"></i>
                    <span>Déconnexion</span>
                </a>
            </button>
        </div>
        <!-- contenu -->
        <div class="flex-1 ml-52 min-h-screen w-full  space-y-4 p-2">
            <!-- Topbar -->
            <header id="topbar" class="bg-white shadow p-4 flex justify-between items-center rounded-md">
                <h1 class="text-xl font-semibold">Bienvenue <span>👋 </span></h1>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <i class="ri-user-3-line text-pink-600 text-xl"></i>
                        <div class="text-sm">
                            <?php if (getUser()): ?>
                                <p class="font-semibold"><?= getUser()["prenom"] ?> <?= getUser()["nom"] ?></p>
                                <?php if (getUser()["role"] == 'responsable'): ?>
                                    <p class="text-gray-500">Responsable Pédagogique</p>
                                <?php elseif (getUser()["role"] == 'etudiant'): ?>
                                    <p class="text-gray-500">Matricule : <span><?=getUser()["matricule"]?></span> </p>
                                <?php elseif (getUser()["role"] == 'attache'): ?>
                                    <p class="text-gray-500">Attaché(e)</p>
                                    <?php elseif (getUser()["role"] == 'professeur'): ?>
                                        <p class="text-gray-500"><?=getUser()["grade"]?></p>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </header>
            <div class="bg-white bg-opacity-50 rounded-lg p-8 space-y-6 shadow  ">
                <?= $contenu ?>
            </div>
        </div>
</body>

</html>