  <div class="flex flex-col">
    <h2 class="font-semibold text-3xl text-gray-700">Tous les référentiel</h2>
    <p>La liste de tou s les référentiels de formations</p>
  </div>

  <!-- pour les recherches -->
  <div class="grid grid-cols-[75%_auto] gap-2 mt-12">
    <form action="" id="filterForm" method="get" class="flex justify-between">
      <input class="hidden" name="controller" value="ref" />
      <input class="hidden" name="page" value="ref" />
      <div class="w-[70%]">
        <label class="input input-neutral  border border-gray-600 w-full ">
          <i class="ri-search-line text-gray-400"></i>
          <input type="search" required placeholder="Search" name="search"
            value="<?= isset($_GET['search']) ? ($_GET['search']) : '' ?>"
            onchange="document.getElementById('filterForm').submit()" />
        </label>
      </div>
    </form>
    <button class="btn bg-[#BB0404] text-white shadow hover:opacity-50 p-2"
      onclick="my_modal_5.showModal()">
      <i class="ri-add-line"></i> <span>Ajouter un référentiel</span> </button>
  </div>

  <!-- la liste des promos -->
  <?php if ($refs != null): ?>
    <div class="grid grid-cols-4 gap-4">
      <?php foreach ($refs as $value): ?>
        <?php
        $binaryImage = $image($value['id']);
        $imgSrc = 'https://img.freepik.com/photos-gratuite/afro-americain-travaille-ordinateur-pour-ecrire-du-code-programmation_482257-116258.jpg?uid=R136284794&ga=GA1.1.1296348742.1720653911&semt=ais_hybrid&w=740';
        if ($binaryImage) {
          $base64Image = base64_encode($binaryImage);
          $imgSrc = 'data:image/png;base64,' . $base64Image;
        }
        ?>
        <div class="card bg-base-100  shadow-sm p-1">
          <div>
            <img class="object-cover rounded "
              src="<?= htmlspecialchars($imgSrc)?>"
              alt="Shoes"/>
          </div>
          <div class="card-body">
            <h2 class="card-title text-[#BB0404]"><?= $value['libelle'] ?></h2>
            <p><?= $value['description'] ?></p>
            <hr>
            <p>Capacité : <?= $value['capacite'] ?></p>
            <div class="card-actions justify-end">
              <button class="btn btn-primary px-2">
                <p class="<?= ($value['statut'] == 'Actif') ? 'text-green-600' : 'text-red-400' ?>">
                  <?= $value['statut'] ?>
                </p>
                <a href="<?= PAGE ?>controller=ref&page=ref&id=<?= $value['id'] ?>">
                  <i class="ri-shut-down-line
                <?= ($value['statut'] == 'Inactif') ? 'bg-green-300 text-green-600 rounded' : 'bg-red-300 text-red-400 rounded' ?>"></i>
              </button>
              </a>
              </button>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  <?php else: ?>
    <p class="text-center text-gray-500 col-span-full">Aucun référentiel trouvé.</p>
    </div>
  <?php endif ?>
  </div>
  <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
      <h3 class="text-lg font-bold">Créer un nouveau référentiel</h3>
      <p class="py-4">Remplir les informations ci-dessous pour créer un nouveau référentiel </p>
      <div class="modal-action">
        <form method="POST" action="" enctype="multipart/form-data" class="w-full">
          <input type="hidden" name="controller" value="ref">
          <input type="hidden" name="page" value="ref">
          <p class="text-red-500" name="erreur" id="niveauError"><?= $errors["erreur"] ?? '' ?></p>
          <div class="form-control mb-4">
            <label class="label">
              <span class="label-text text-sm font-medium text-gray-700">Photo du référentiel</span>
            </label>
            <div class="w-40 h-32 border-2 border-dashed border-gray-300 rounded-lg p-2 text-center"> Ajuster ou glisser
              <input type="file" name="image" accept="image/*" value="<?= $cours['nbre_heure'] ?? '' ?>" placeholder="" class="
                   opacity-0  w-full h-32 cursor-pointer  focus:outline-none focus:ring-2 focus:ring-pink-500 ">
            </div>
            <p class="text-red-500"><?= $errors["image"] ?? '' ?></p>
          </div>
          <div class="form-control mb-4">
            <label class="label">
              <span class="label-text text-sm font-medium text-gray-700">Libelle</span>
            </label>
            <input type="text" name="libelle" value="<?= $cours['heure_debut'] ?? '' ?>" placeholder="" class="input input-bordered 
                    mt-1 block w-full px-3 py-2 border border-gray-300  rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500 ">
            <p class="text-red-500"><?= $errors["libelle"] ?? '' ?></p>
          </div>
                    <div class="form-control mb-4">
            <label class="label">
              <span class="label-text text-sm font-medium text-gray-700">Description</span>
            </label>
            <textarea name="description"  value="<?= $cours['heure_debut'] ?? '' ?>" id="" class="input input-bordered 
                mt-1 block w-full px-3 py-2 border border-gray-300  rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500 "></textarea>
            <p class="text-red-500"><?= $errors["description"] ?? ''?></p>
          </div>
          <div class="form-control mb-4">
            <label class="label">
              <span class="label-text text-sm font-medium text-gray-700">Capacité</span>
            </label>
            <input type="text" name="capacite" value="<?= $cours['heure_debut'] ?? '' ?>" placeholder="" class="input input-bordered 
                    mt-1 block w-full px-3 py-2 border border-gray-300  rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500 ">
            <p class="text-red-500"><?= $errors["capacite"] ?? '' ?></p>
          </div>
          <div class="flex items-center gap-4 justify-end">
            <button type="button" class="btn w-40 bg-gray-400 text-white py-2 rounded-lg hover:bg-gray-700"><a href="<?= PAGE ?>?controller=ref&page=ref">Annuler</a></button>
            <button name="addRef" type="submit" class="btn w-40 bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </dialog>