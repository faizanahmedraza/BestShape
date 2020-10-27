@extends('layouts.dashboard')

@section('styles')
<style>
    a.blue {
        background: #3498db;
        color: white;
        font-size: 1.1rem;
        padding: .4rem .7rem;
        text-decoration: none;
        border-radius: 5px;
    }
</style>
@endsection

@section('nav')
<div class="nav">
    <a class="nav-link" href="/home" aria-selected="true">
        <div class="sb-nav-link-icon">
            <i class="far fa-user"></i>
        </div>
        Users
    </a>
    <a class="nav-link {{ Request::path() === 'recipes/'.$recipe->id ? 'active' : '' }}" href="/recipes">
        <div class="sb-nav-link-icon">
            <i class="fas fa-utensils"></i>
        </div>
        Recipes
    </a>
    <a class="nav-link" href="/exercises">
        <div class="sb-nav-link-icon">
            <i class="fas fa-walking"></i>
        </div>
        Exercices
    </a>
    <a class="nav-link" href="/challenges">
        <div class="sb-nav-link-icon">
            <i class="fas fa-tasks"></i>
        </div>
        Challenges
    </a>
</div>
@endsection

@section('layoutSidenav_content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-2 mt-2">
                <li
                    class="breadcrumb-item active">
                    Recipes -- Details
                </li>
            </ol>
            <div
                class="row flex-row justify-content-center mt-3 mb-2">
                <img id="img-recipe" class=""
                    name="img-recipe"
                    src="{{asset('/images/'.$recipe->recipeImage)}}"
                    alt=""
                    style="width:230px!important; height: 180px!important; border:1px solid grey; border-style: dashed; border-radius: 5px;">
            </div>
            <div
                class="mb-3 row justify-content-center">
                <div class="col-xl-3 col-md-3">
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="input-group mb-3">
                        <span
                            class="input-group-text"
                            style="background: transparent; border:none;">Recipe
                            Name</span>
                        <input type="text"
                            id="name" name="name"
                            aria-label="Recipe name"
                            class="form-control"
                            value="{{ $recipe->name }}"
                            readonly>
                    </div>
                    <div class="input-group">
                        <span
                            class="input-group-text mr-3"
                            style="background: transparent; border:none;">Description</span>
                        <textarea id="description"
                            name="description"
                            class="form-control"
                            id="" cols="40"
                            rows="3"
                            readonly>{{ $recipe->description }}</textarea>
                    </div>
                    <div
                        class="input-group mb-3 mt-3">
                        <span
                            class="input-group-text"
                            style="background: transparent; border:none;">Recipe
                            Category</span>
                        <input type="text"
                            id="category"
                            name="category"
                            aria-label="Recipe name"
                            class="form-control"
                            value="{{ $recipe->category }}"
                            readonly>
                    </div>
                    <div
                        class="row flex-row flex-nowrap mt-5">
                        <div class="col-auto">
                            <label for="netcrab"
                                class="mt-2">Net
                                Carb</label><br><br>
                            <label for="totalcrab"
                                class="mt-1">Total
                                Carb</label><br><br>
                            <label for="netcal"
                                class="mt-1">Net
                                Calories</label><br><br>
                            <label for="totalfat"
                                class="mt-1">Total
                                Fat</label><br><br>
                            <label for="choles"
                                class="mt-1">Cholestrol</label><br><br>
                            <label for="sod"
                                class="mt-1">Sodium</label><br><br>
                            <label for="pot"
                                class="mt-1">Potassium</label>
                        </div>
                        <div class="col-auto">
                            <input type="text"
                                class="form-control"
                                id="netcarb"
                                name="netcarb"
                                placeholder=""
                                value="{{ $recipe->netcarb }}"
                                readonly><br>
                            <input type="text"
                                class="form-control"
                                id="totalcarb"
                                name="totalcarb"
                                placeholder=""
                                value="{{ $recipe->totalcarb }}"
                                readonly><br>
                            <input type="text"
                                class="form-control"
                                id="netcal"
                                name="netcal"
                                placeholder=""
                                value="{{ $recipe->netcal }}"
                                readonly><br>
                            <input type="text"
                                class="form-control"
                                id="totalfat"
                                name="totalfat"
                                placeholder=""
                                value="{{ $recipe->totalfat }}"
                                readonly><br>
                            <input type="text"
                                class="form-control"
                                id="choles"
                                name="choles"
                                placeholder=""
                                value="{{ $recipe->choles }}"
                                readonly><br>
                            <input type="text"
                                class="form-control"
                                id="sod"
                                name="sod"
                                placeholder=""
                                value="{{ $recipe->sod }}"
                                readonly><br>
                            <input type="text"
                                class="form-control"
                                id="pot"
                                name="pot"
                                placeholder=""
                                value="{{ $recipe->pot }}"
                                readonly>
                        </div>
                        <div class="col-auto">
                            <label for="netcrab"
                                class="mt-1">g</label><br><br>
                            <label for="netcrab"
                                class="mt-1">g</label><br><br>
                            <label for="netcrab"
                                class="mt-2">kcal</label><br><br>
                            <label for="netcrab"
                                class="mt-2">g</label><br><br>
                            <label for="netcrab"
                                class="mt-1">g</label><br><br>
                            <label for="netcrab"
                                class="mt-1">g</label><br><br>
                            <label for="netcrab"
                                class="mt-1">g</label><br><br>
                        </div>
                        <div class="col-auto">
                            <input type="text"
                                class="form-control"
                                id="netcarb_p"
                                name="netcarb_p"
                                placeholder=""
                                value="{{ $recipe->netcarb_p }}"
                                readonly><br>
                            <input type="text"
                                class="form-control"
                                id="totalcarb_p"
                                name="totalcarb_p"
                                placeholder=""
                                value="{{ $recipe->totalcarb_p }}"
                                readonly><br>
                            <input type="text"
                                class="d-none"
                                placeholder=""
                                style="visibility: hidden;"><br><br>
                            <input type="text"
                                class="form-control"
                                id="totalfat_p"
                                name="totalfat_p"
                                placeholder=""
                                placeholder=""
                                value="{{ $recipe->totalfat_p }}"
                                readonly><br>
                            <input type="text"
                                class="form-control"
                                id="choles_p"
                                name="choles_p"
                                placeholder=""
                                value="{{ $recipe->choles_p }}"
                                readonly><br>
                            <input type="text"
                                class="form-control"
                                id="sod_p"
                                name="sod_p"
                                placeholder=""
                                value="{{ $recipe->sod_p }}"
                                readonly><br>
                            <input type="text"
                                class="form-control"
                                id="pot_p"
                                name="pot_p"
                                placeholder=""
                                value="{{ $recipe->pot_p }}"
                                readonly><br>

                        </div>
                        <div class="col-auto">
                            <label for="netcarb_p"
                                class="mt-1">%</label><br><br>
                            <label
                                for="totalcarb_p"
                                class="mt-1">%</label><br><br>
                            <label for="netcal_p"
                                class="sr-only">%</label><br><br>
                            <label
                                for="totalcarb_p"
                                class="mt-4">%</label><br><br>
                            <label
                                for="totalcarb_p"
                                class="mt-2">%</label><br><br>
                            <label
                                for="totalcarb_p"
                                class="mt-2">%</label><br><br>
                            <label
                                for="totalcarb_p"
                                class="mt-2">%</label><br><br>
                        </div>
                    </div>
                    <div
                    class="row justify-content-end">
                    <a href="/recipes/"
                        class="blue">Back</a>
                </div>
                </div>
                <div class="col-xl-3 col-md-3">
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div
                class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">
                    Copyright &copy; {{ config('app.name') }} 2020</div>
                <div>
                    <a href="#">Privacy
                        Policy</a>
                    &middot;
                    <a href="#">Terms
                        &amp;
                        Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection