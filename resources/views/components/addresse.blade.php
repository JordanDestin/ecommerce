<div>
 
                    <div class="mb-3">
                        <label for="address">Addresse</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Addresse" @isset($addresse) value="{{ $addresse->address }}" @else value="" @endisset required>
                     
                    </div>
        
                    <div class="mb-3">
                        <label for="address2">Complément d'addresse</label>
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Complément d'addresse"  @isset($addresse) value="{{ $addresse->addressbis }}" @else value="" @endisset>
                    </div>
        
                    <div class="row">
                        <div class="col-md-6 mb-3">
                        <label for="country">Ville</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Ville"  @isset($addresse) value="{{ $addresse->city }}" @else value="" @endisset required>
                  
                        </div>
    
                        <div class="col-md-6 mb-3">
                        <label for="zip">Code Postal</label>
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Code Postal" @isset($addresse) value="{{ $addresse->postal }}" @else value="" @endisset required>
        
                        </div>
                    </div>        
                    <div class="mb-3">
                        <label for="phone">Téléphone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Téléphone"  @isset($addresse) value="{{ $addresse->phone }}" @else value="" @endisset required>
                    
                    </div>        
                    <div class="row mb-0">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                Modifier
                            </button>
                        </div>
                    </div>
                    <hr class="mb-4">
    
</div>