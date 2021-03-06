@csrf
@cannot('is-observateur') 

<div class="row mb-12">

    <div class="col-6 mb-3">
       <label for="name" class="col-md-4 col-form-label text-black">{{ __('Nom') }}</label>
       <input name="Nom" type="text" class="form-control @error('name') is-invalid @enderror"  required autocomplete="Nom" autofocus
       value="@isset($conducteur){{ $conducteur->Nom }}@endisset">

          @error('Nom')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
  </div>

    <div class="col-6 mb-3">
        <label for="Prenom" class="col-md-4 col-form-label text-black">{{ __('Prénom') }}</label>
        <input id="Prenom" type="Prenom" class="form-control " name="Prenom"  required autocomplete="Prenom"
        value="@isset($conducteur){{ $conducteur->Prenom }}@endisset">

        @error('Prenom')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="row mb-12">
    <div class="col-6 mb-3">
        <label for='tel' class="col-md-4 col-form-label" style="color: black" > {{ __('Téléphone') }}</label>
        <input name='tel' type='tel' class="form-control" required  pattern="[0]{1}[5-7]{1}[0-9]{8}" placeholder="exp:0567879829" aria-label="10-digit area code"
        value="@isset($conducteur){{ $conducteur->tel }}@endisset">
        
        @error('tel')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
   </div>
    <div class="col-6 mb-3">
        <label for='Adresse' class="col-md-4 col-form-label" style="color: black" > {{ __('Adresse') }}</label>
        <input name='Adresse' type='Adresse' class="form-control" required
        value="@isset($conducteur){{ $conducteur->Adresse }}@endisset">
        
        @error('Adresse')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
   </div>
</div>

<div class="row mb-12">
    <div class="col-6 mb-3">
   <label for='Vehicule' style="color: black"> {{ __('Véhicule(Matricule)') }}</label>
              <select name='vehicule_id' type='texte' class="form-select" required>
              
              <option selected disabled value=""> Liste Véhicules</option>
              @foreach($vehicules as $vehicule)
              <option value="{{ $vehicule->id }}" id="{{ $vehicule->Matricule }}"
                  @isset($conducteur)
                 @if ($vehicule->id == $conducteur->vehicule->id) selected @endif
                  @endisset>
                 {{ $vehicule->Matricule }}
                 
          @endforeach
              @error('Vehicule')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
               </select>
          </div>

          <div class="col-6 mb-3">
            <label for='wilaya_id' class="col-md-4 col-form-label" style="color: black"> {{ __('Wilaya') }}</label>
            <select id="wilaya_id" class="form-select" name='wilaya_id' required>
            @foreach ($wilayas as $wilaya)
            <option value="{{ $wilaya->id }}"@isset($conducteur) @if ($conducteur->wilaya->id == $wilaya->id)
                selected
            @endif @endisset >
            {{ $wilaya->name }}
        </option>
            @endforeach 

                 
              </select>
         
       </div>

        </div>
           



<div class="d-flex flex-row bd-highlight mb-3" >
    <a class="mx-1" href="{{ route('gestionv.conducteurs.index') }}" ><button class="btn btn-sm btn-success" type="submit">Enregistrer</button>  </a>
    <a class="mx-1" href="{{ route('gestionv.conducteurs.index') }}" ><button class="btn btn-sm btn-secondary" type="button">Annuler</button>  </a>
</div>

@endcannot