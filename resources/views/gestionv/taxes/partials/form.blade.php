@csrf
@cannot('is-observateur') 

<div class="row mb-12">
    <div class="col-6 mb-3">
        <label for='Vehicule' class="col-md-9 col-form-label" style="color: black"> {{ __('Véhicule(Matricule)') }}</label>
                   <select name='vehicule_id' type='texte' class="form-select" required>
                  
                   <option value=""> Liste Véhicules  </option>
                   @foreach($vehicules as $vehicule)
                   
                   <option value="{{ $vehicule->id }}" id="{{ $vehicule->Matricule }}"
                       @isset($taxe)
                      @if ($vehicule->id == $taxe->vehicule->id) selected @endif
                       @endisset>
                      {{ $vehicule->Matricule }}
               @endforeach
                   @error('vehicule_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </select>
    </div>
    <div class="col-6 mb-3">
        <label for="nom" class="col-md-9 col-form-label text-black">{{ __('Nom de la Taxe') }}</label>
        <select name="nom" type="text" class="form-select"  required 
            value="" @isset($taxe){{ $taxe->nom }}@endisset selected>
            <option  disabled value=""> Taxe </option>
            @if(isset($taxe->nom))
            <option value="{{ $taxe->nom  }}" {{ ' selected'}}>
              {{ $taxe->nom }}
            </option>
          @endif
            <option> Vignette </option>
            <option> Péage </option>

        </select>
           @error('nom')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
    </div>
</div>
<div class="row mb-12">     
    <div class="col-6 mb-3">
        <label for='date' class="col-md-9 col-form-label" style="color: black" > {{ __("Date Taxe") }}</label>
        <input name='date' type='date' class="form-control" required placeholder="Entre 1 et 365 jours" 
        value="@isset($taxe){{ $taxe->date }}@endisset">
        
        @error('date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
   </div>
   <div class="col-6 mb-3">
    <label for='expire' class="col-md-9 col-form-label" style="color: black" > {{ __("Expiration Taxe") }}</label>
    <input name='expire' type='date' class="form-control" required placeholder="Entre 1 et 365 jours" 
    value="@isset($taxe){{ $taxe->expire }}@endisset">
    
    @error('expire')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
  @enderror
 </div>
</div>

<div class="row mb-12">
    <div class="col-6 mb-3">
        <label for='rappel' class="col-md-9 col-form-label" style="color: black" > {{ __('Rappel Avant (jours)') }}</label>
        <input name='rappel' type='number' class="form-control" required placeholder="Entre 1 et 365 jours" 
        value="@isset($taxe){{ $taxe->rappel }}@endisset">
        
        @error('rappel')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
   </div>

   <div class="col-6 mb-3">
    <label for='wilaya_id' class="col-md-4 col-form-label" style="color: black"> {{ __('Wilaya') }}</label>
    <select id="wilaya_id" class="form-select" name='wilaya_id' required>
    @foreach ($wilayas as $wilaya)
    <option value="{{ $wilaya->id }}"@isset($taxe) @if ($taxe->wilaya->id == $wilaya->id)
        selected
    @endif @endisset >
    {{ $wilaya->name }}
</option>
    @endforeach 

         
      </select>
 
</div>
   
</div>




<div class="d-flex flex-row bd-highlight mb-3" >
    <a class="mx-1" href="{{ route('gestionv.taxes.index') }}" ><button class="btn btn-sm btn-success" type="submit">Enregistrer</button>  </a>
    <a class="mx-1" href="{{ route('gestionv.taxes.index') }}" ><button class="btn btn-sm btn-secondary" type="button">Annuler</button>  </a>
</div>

@endcannot