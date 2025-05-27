<div class="flex justify-between">
  <div class="flex flex-col">
    <h2 class="font-semibold text-3xl text-gray-700">Promotion</h2>
    <p>Gérer les promos</p>
  </div>
  <button class="btn bg-[#BB0404] text-white shadow hover:opacity-50 p-2"
  onclick="my_modal_5.showModal()">
    <i class="ri-add-line"></i> <span>Ajouter un promo</span> </button>
</div>

<!-- les statistiques -->
<div class="grid grid-cols-4 gap-4">
  <div class="card card-border bg-base-100 text-white bg-[#BB0404] ">
    <div class="card-body">
      <h2 class="card-title"><?= $promoActif ?></h2>
      <p>Promos Actifs</p>
    </div>
  </div>
  <div class="card card-border bg-base-100 text-white bg-[#bf7e6e] ">
    <div class="card-body">
      <h2 class="card-title"><?= $apprenant ?></h2>
      <p>Apprenants</p>
    </div>
  </div>
  <div class="card card-border bg-base-100 text-gray-700 bg-[#ffe6d9] ">
    <div class="card-body">
      <h2 class="card-title"><?= $ref ?></h2>
      <p>Référentiel</p>
    </div>
  </div>
  <div class="card card-border bg-base-100 text-white bg-[#57b8d1] ">
    <div class="card-body">
      <h2 class="card-title"><?= $promo ?></h2>
      <p>Promotions</p>
    </div>
  </div>
</div>
<!-- pour les recherches -->
<div class="grid grid-cols-[85%_auto] gap-2 mt-12">
  <form action="" id="filterForm" method="get" class="flex justify-between">
    <input class="hidden" name="controller" value="promo" />
    <input class="hidden" name="page" value="dashboard" />
    <input class="hidden" name="vue" value="<?= $vue ?>" /> 
    <div class="w-[70%]">
      <label class="input input-neutral  border border-gray-600 w-full ">
        <i class="ri-search-line text-gray-400"></i>
        <input type="search" required placeholder="Search" name="search"
        value="<?= isset($_GET['search']) ? ($_GET['search']) : '' ?>"
         onchange="document.getElementById('filterForm').submit()"  />
      </label>
    </div>
    <select name="statut" class="select join-item border border-gray-600 w-[10%]" onchange="document.getElementById('filterForm').submit()">
      <option value="Tous" <?= (isset($_GET['statut']) && $_GET['statut'] =="Tous") ? 'selected' : '' ?>>Tous</option>
      <option value="Actif" <?= (isset($_GET['statut']) && $_GET['statut'] =="Actif") ? 'selected' : '' ?>>Actif</option>
      <option value="Inactif" <?= (isset($_GET['statut']) && $_GET['statut'] =="Inactif") ? 'selected' : '' ?>>Inactif</option>
    </select>
  </form>
<div class="card-actions justify-end">
  <a href="<?= PAGE ?>controller=promo&page=dashboard&vue=grille&statut=<?= $stat ?>">
    <button class="btn border border-gray-600 p-2 <?= ($vue == "grille") ? 'bg-[#BB0404] text-white' : '' ?>">Grille</button>
  </a>
  <a href="<?= PAGE ?>controller=promo&page=dashboard&vue=list&statut=<?= $stat ?>">
    <button class="btn border border-gray-600 p-2 <?= ($_GET["vue"] == "list") ? 'bg-[#BB0404] text-white' : '' ?>">Liste</button>
  </a>
</div>

</div>

<!-- la liste des promos -->
 
<h1 class="">La liste des promos</h1>
<?php if ($liste != null): ?>
  <!-- EN cardes -->
  <?php if ($vue == 'grille'): ?>
    <div class="grid grid-cols-3 gap-4">
      <?php foreach ($liste as $value): ?>
        <?php
      $binaryImage = $image($value['id']);
      $imgSrc='https://img.freepik.com/photos-gratuite/afro-americain-travaille-ordinateur-pour-ecrire-du-code-programmation_482257-116258.jpg?uid=R136284794&ga=GA1.1.1296348742.1720653911&semt=ais_hybrid&w=740';
      if ($binaryImage) {
          $base64Image = base64_encode($binaryImage);
          $imgSrc = 'data:image/png;base64,' . $base64Image;
      } 
    ?>
        <div class="card  bg-base-100 shadow-sm px-6 space-y-1 p-2">
              <div class=" bg-gray-100 text-sm  rounded-xl shadow flex justify-center gap-2  p-1 place-self-end">
                  <p class="<?=($value['statut']=='Actif')?'text-green-600':'text-red-400'?>">
                   <?= $value['statut']?></p>
                   <a href="<?= PAGE ?>controller=promo&page=dashboard&id=<?= $value['id'] ?>">
                <button class="rounded-lg px-1 <?=($value['statut']=='Inactif')?'bg-green-300 text-green-600 ':'bg-red-300 text-red-400 '?>">
                  <i class="ri-shut-down-line"></i></button>
                  </a>
            </div>
          <div class="">
          <div class="flex gap-5 py-4">
          
<img class="rounded-full h-12 w-12" src="<?= htmlspecialchars($imgSrc) ?>" alt="Image" />
            <div  class=" text-center">
            <h2 class="card-title text-lg font-semibold"></span><?= $value['nom'] ?></h2>
            <p class="text-sm"><span><?= $value['date_debut'] ?> - <?= $value['date_fin'] ?></span></p>
            </div>
          </div>
            <p class="bg-slate-50 rounded-lg w-full text-center text-xs p-2 "><span><?= $value['nom'] ?></span>
              Appreants</p>
            <div class="card-actions justify-end">
              <a href="" class=" text-red-600 m-2">voir détails</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
  </div>   
      <?php elseif ($vue == 'list'): ?>
      <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
          <thead>
            <tr>
              <th>Photo</th>
              <th>Promotion</th>
              <th>Date début</th>
              <th>Date Fin</th>
              <th>Référentiel</th>
              <th>Statut</th>
              <th>Actions</th>
            </tr>
          </thead>
          <?php foreach ($liste as $value): ?>
            <tbody>
              <tr>
                <td>
                  <img class="w-12 h-12 rounded shadow" src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp" alt="Movie" />
                </td>
                <td><?= $value['nom'] ?></td>
                <td><?= $value['date_debut'] ?></td>
                <td><?= $value['date_fin'] ?></td>
                <td><?= $value['libelle'] ?></td>
                <td class="">
                  <div class="bg-white rounded-lg shadow flex justify-center gap-4 px-2 py-1 ">
                    <p class="<?=($value['statut']=='Actif')?'text-green-600':'text-red-400'?>">
                     <?= $value['statut']?></p>
                  <button class="rounded-lg px-1 <?=($value['statut']=='Inactif')?'bg-green-300 text-green-600 ':'bg-red-300 text-red-400 '?>">
                    <i class="ri-shut-down-line"></i></button>
                  </div>
                </td>
                <td >
              <a href="" class="text-red-400">voir détails</a>
                </td>
              </tr>
            </tbody>
                <?php endforeach ?>
        </table>
      </div>
  <?php endif; ?>
<?php else: ?>
  <p class="text-center text-gray-500 col-span-full">Aucune Promotion.</p>
    </div>
  <?php endif ?>
  </div>
  <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
  <div class="modal-box">
    <h3 class="text-lg font-bold">Créer une nouvelle promotion</h3>
    <p class="py-4">Remplacer les informations ci-dessous pour créer une nouvelle promotion </p>
    <div class="modal-action">
      <!-- <form method="dialog"> -->
    <form method="POST" action=""  enctype="multipart/form-data">
        <input type="hidden" name="controller" value="promo">
        <input type="hidden" name="page" value="dashboard">
        <input type="hidden" name="id" value="<?= $_GET['edit'] ?? '' ?>">
        <p class="text-red-500" name="erreur" id="niveauError"><?= $errors["erreur"] ?? '' ?></p>
        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text text-sm font-medium text-gray-700">Nom de la promo</span>
            </label>
            <input type="text" name="nom" value="<?= $cours['heure_debut'] ?? '' ?>" placeholder="" class="input input-bordered 
                    mt-1 block w-full px-3 py-2 border border-gray-300  rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500 ">
            <p class="text-red-500"><?= $errors["hd"] ?? '' ?></p>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="form-control mb-4">
              <label class="label">
                  <span class="label-text text-sm font-medium text-gray-700">Date prévue</span>
              </label>
              <input type="date" name="dd" value="<?= $cours['date'] ?? '' ?>" placeholder="" class="input input-bordered 
                      mt-1 block w-full px-3 py-2 border border-gray-300  rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500 ">
              <p class="text-red-500"><?= $errors["date"] ?? '' ?></p>
          </div>
          <div class="form-control mb-4">
              <label class="label">
                  <span class="label-text text-sm font-medium text-gray-700">Date prévue</span>
              </label>
              <input type="date" name="df" value="<?= $cours['date'] ?? '' ?>" placeholder="" class="input input-bordered 
                      mt-1 block w-full px-3 py-2 border border-gray-300  rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500 ">
              <p class="text-red-500"><?= $errors["date"] ?? '' ?></p>
          </div>
        </div>
          <div class="form-control mb-4">
            <label class="label">
                <span class="label-text text-sm font-medium text-gray-700">Photo de la promotion</span>
            </label>
            <div class="w-40 h-32 border-2 border-dashed border-gray-300 rounded-lg p-6 text-center"> Ajuster ou glisser
            <input type="file" name="image" accept="image/*" value="<?= $cours['nbre_heure'] ?? '' ?>" placeholder="" class="
                   opacity-0  w-full h-32 cursor-pointer  focus:outline-none focus:ring-2 focus:ring-pink-500 ">
              </div>
            <p class="text-red-500"><?= $errors["nbre_heure"] ?? '' ?></p>
        </div>

        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text text-sm font-medium text-gray-700">Sélectionner une ou plusieus références</span>
            </label>
            <div class="w-full flex overflow-x-auto p-2 space-x-2">
                <?php
                foreach ($refs as $val):?>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox"
                         name="check[]"
                          value="<?= $val["id"] ?>"
                          <?= (isset($cours['classes']) && in_array($val["id"], $cours['classes'])) ? 'checked' : '' ?>
                          
                         class="form-checkbox text-pink-600">
                        <span><?= $val['libelle'] ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
            <p class="text-red-500"><?= $errors["classe"] ?? '' ?></p>
        </div>

        <div class="flex items-center justify-between">
            <button type="button" class="btn w-40 bg-gray-400 text-white py-2 rounded-lg hover:bg-gray-700"><a href="<?= PAGE ?>?controller=promo&page=dashboard">Annuler</a></button>
            <button name="addPromo" type="submit" class="btn w-40 bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</dialog>