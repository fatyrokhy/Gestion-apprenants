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
<div class="grid grid-cols-[75%_auto] gap-4 mt-12">
  <form action="" method="get" class="grid grid-cols-[75%_auto] gap-4">
    <input class="hidden" name="controller" value="promo" />
    <input class="hidden" name="page" value="listePromo" />
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
  <div class="card-actions justify-end grid grid-cols-2">
    <button class="btn bg-[#BB0404] text-white">Grille</button>
    <button class="btn border border-gray-600">Liste</button>
  </div>
</div>
<!-- la liste des -->
 <h1 class="">La liste des promos</h1>
<div class="grid grid-cols-3 gap-4">
<div class="card card-side bg-base-100 shadow-sm">
  <figure>
    <img
      src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
      alt="Movie" />
  </figure>
  <div class="card-body">
    <h2 class="card-title">New movie is released!</h2>
    <p>Click the button to watch on Jetflix app.</p>
    <div class="card-actions justify-end">
      <button class="btn btn-primary">Watch</button>
    </div>
  </div>
</div>
</div>