
    <div class="card">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name: <b id="cv_name">{{isset($card['name']) ? $card['name'] : '' }}</b></label>


                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="designation">Designation: <b id="cv_designation">{{ isset($card['designation']) ? $card['designation'] : '' }}</b></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="business_name">Business Name: <b id="cv_business_name">{{ isset($card['business_name']) ? $card['business_name'] : '' }}</b></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">Description: <b id="cv_description">{{ isset($card['description']) ? $card['description'] : '' }}</b></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="wp_number">WhatsApp Number: <b id="cv_wp_number">{{ isset($card['wp_number']) ? $card['wp_number'] : '' }}</b></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="contacts">Contacts: <b id="cv_contacts">{{ isset($card['contacts']) ? $card['contacts'] : '' }}</b></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">Address: <b id="cv_address">{{ isset($card['address']) ? $card['address'] : '' }}</b></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">Photo</label>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="">
                                        <img src="{{ isset($card['photo']) ? asset('storage'.$card['photo']) : '' }}" alt="" height="250" width="250" id="cv_photo" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
