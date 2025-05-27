<!-- pour les recherches -->
<div class="grid grid-cols-[75%_auto] gap-4 ">
  <form action="" method="get" class="grid grid-cols-[75%_auto] gap-4">
    <input class="hidden" name="controller" value="ref" />
    <input class="hidden" name="page" value="ref" />
    <div>
      <label class="input input-neutral  border border-gray-600 w-full ">
        <i class="ri-search-line text-gray-400"></i>
        <input type="search" required placeholder="Search" />
      </label>
    </div>
    <select class="select join-item border border-gray-600 w-full">
      <option disabled selected>Filter</option>
      <option>Sci-fi</option>
      <option>Drama</option>
      <option>Action</option>
    </select>
  </form>
  <div class="card-actions justify-end ">
    <button class="btn bg-[#BB0404] text-white p-2">
      <a href="<?= PAGE ?>controller=promo&page=grille">Grille</button>
    <button class="btn border border-gray-600 p-2">
      <a href=" <?= PAGE ?> controller=promo&page=liste"></a>Liste</button>
  </div>
</div>
<div class="flex justify-between">
  <div class="flex flex-col text-sm">
    <h2 class="font-semibold text-xl text-gray-700">Référence</h2>
    <p>Gérer les référentiels</p>
  </div>
  <button class="btn bg-[#BB0404] text-white text-sm shadow hover:opacity-50 p-2">
    <i class="ri-add-line"></i> <span>Ajouter un référentiel</span> </button>
</div>
<!-- la liste des -->
<?php if ($refs != null): ?>
  <div class="grid grid-cols-3 gap-8">
    <?php foreach ($refs as $value): ?>
<div class="card bg-base-100 w-96 shadow-sm">
  <figure>
    <img
      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
      alt="Shoes" />
  </figure>
  <div class="card-body">
    <h2 class="card-title">
      <?= $value['libelle'] ?>
      <div class="badge bg-gray-100 ">
                <p class="<?= ($value['statut'] == 'Actif') ? 'text-green-600' : 'text-red-400' ?>">
                  <?= $value['statut'] ?></p>
                <button class="rounded-lg px-1 <?= ($value['statut'] == 'Inactif') ? 'bg-green-300 text-green-600 ' : 'bg-red-300 text-red-400 ' ?>">
                  <i class="ri-shut-down-line"></i></button>      </div>
    </h2>
    <p>Capacité : <span><?= $value['capacite'] ?></span></p>
    <div class="card-actions justify-end">
      <div class="badge badge-outline">Fashion</div>
      <div class="badge badge-outline">Products</div>
    </div>
  </div>
</div>
    <?php endforeach ?>
  </div>
<?php else: ?>
  <p class="text-center text-gray-500 col-span-full">Aucun Référentiel.</p>
<?php endif ?>

</div>