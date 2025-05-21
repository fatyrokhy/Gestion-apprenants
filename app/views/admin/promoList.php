<div class="flex justify-between">
  <div class="flex flex-col">
    <h2 class="font-semibold text-3xl text-gray-700">Promotion</h2>
    <p>Gérer les promos</p>
  </div>
  <button class="btn bg-[#BB0404] text-white shadow hover:opacity-50 p-2">
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
      <h2 class="card-title"> <?= $apprenant ?></h2>
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
<div class="grid grid-cols-[75%_auto] gap-4 mt-12">
  <form action="" method="get" class="grid grid-cols-[75%_auto] gap-4">
    <input class="hidden" name="controller" value="promo" />
    <input class="hidden" name="page" value="promoList" />
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
      <a href=" <?= PAGE ?> controller=promo&page=liste" ></a>Liste</button>
  </div>
</div>
<!-- la liste des -->
  <h1 class="">La liste des promos</h1>
  <?php if ($liste != null): ?>
<div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
  <table class="table">
    <!-- head -->
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
    <tbody>
      <!-- row 1 -->
      <tr>
        <th></th>
        <td>Cy Ganderton</td>
        <td>Quality Control Specialist</td>
        <td>Blue</td>
        <td>Quality Control Specialist</td>
        <td>Quality Control Specialist</td>
        <td>Quality Control Specialist</td>
      </tr>
    </tbody>
  </table>
</div>
<!-- <div class="grid grid-cols-4 gap-4">
  <?php foreach ($liste as $value): ?>
  <div class="card card-side bg-base-100 shadow-sm">
    <div class="">
      <img
        src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
        alt="Movie" />
    </div>
    <div class="card-body">
      <h2 class="card-title"></span><?= $value['nom'] ?></h2>
      <p>Debut:<span><?= $value['date_debut'] ?></span></p>
      <p>Fin:<span><?= $value['date_debut'] ?></span></p>
      <div class="card-actions justify-end">
        <button class="btn bg-red-500 text-white">voir détails</button>
      </div>
    </div>
  </div>
  <?php endforeach ?>
       <?php else: ?>
           <p class="text-center text-gray-500 col-span-full">Aucune Promotion.</p>
       </div>
   <?php endif ?>

</div> -->
