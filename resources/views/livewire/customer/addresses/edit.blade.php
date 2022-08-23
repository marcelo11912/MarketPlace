<div>
    <div class="tab-pane" id="account-details">
        <div class="icon-box icon-box-side icon-box-light">
            <span class="icon-box-icon icon-account mr-2">
                <i class="w-icon-user"></i>
            </span>
            <div class="icon-box-content">
                <h4 class="icon-box-title mb-0 ls-normal">Edit {{$data}} Address</h4>
            </div>
        </div>
        <form class="form account-details-form" action="#" method="post">
            <div class="row">
                <div class="row gutter-sm">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>First name *</label>
                            <input wire:model.lazy="first_name" type="text"
                                class="form-control form-control-md @error('first_name') is-invalid @enderror"
                                name="firstname" required="">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Last name *</label>
                            <input wire:model.lazy="last_name" type="text"
                                class="form-control form-control-md @error('last_name') is-invalid @enderror"
                                name="lastname" required="">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Company name (optional)</label>
                    <input wire:model.lazy="company" type="text"
                        class="form-control form-control-md @error('company') is-invalid @enderror"
                        name="company-name">
                    @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Country / Region *</label>
                    <div class="select-box">
                        <select wire:change="getStates()" wire:model="country_region"
                            name="country"
                            class="form-control form-control-md @error('country_region') is-invalid @enderror">
                            <option value="default" selected="selected"> Seleccionar el Pais</option>
                            @foreach ($countries as $item_country)
                            <option value="{{ $item_country['country_name'] }}">
                                {{ $item_country['country_name'] }}
                            </option>
                        @endforeach
                        </select>
                        @error('country_region')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Street address *</label>
                    <input wire:model.lazy="address_street" type="text"
                        placeholder="House number and street name"
                        class="form-control form-control-md mb-2 @error('address_street') is-invalid @enderror"
                        name="street-address-1" required="">
                    @error('address_street')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                   
                </div>
                <div class="row gutter-sm">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>State *</label>
                            <div class="select-box">
                                <select wire:change="getCities" wire:model="state"
                                    name="country"
                                    class="form-control form-control-md @error('state') is-invalid @enderror">
                                    <option value="default" selected="selected">Seleccionar estado</option>
                                    @foreach ($states as $item_state)
                                        <option value="{{ $item_state['state_name'] }}">
                                            {{ $item_state['state_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>ZIP *</label>
                            <input wire:model.lazy="zip" type="text"
                                class="form-control form-control-md @error('zip') is-invalid @enderror"
                                name="zip" required="">
                            @error('zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>City *</label>
                            <div class="select-box">
                                <select wire:model="town_city" name="country"
                                    class="form-control form-control-md @error('town_city') is-invalid @enderror">
                                    <option value="default" selected="selected">Seleccionar la ciudad
                                    </option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city['city_name'] }}">
                                            {{ $city['city_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('town_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone *</label>
                            <input wire:model.lazy="phone" type="text"
                                class="form-control form-control-md @error('phone') is-invalid @enderror"
                                name="phone" required="">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
              
            </div>
          
           
            <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
        </form>
    </div>

</div>
