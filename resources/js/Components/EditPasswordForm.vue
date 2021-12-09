<template>

<div class="row justify-content-between">
    <div class="col-12 col-sm-6 col-md-6 col-lg-5 col-xl-4">
    
                    <div class="alert alert-danger alert-dismissible" v-if="checkIfError() > 0">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Veuillez remplir correctement les champs ci-dessous.
                </div>

        <form enctype="multipart/form-data" class="form-floating" :action="route('profile.update.password')" method="POST" id="passwordForm" @submit.prevent="storePassword" @keydown="clearError">
            <div>
                <h6 class="p-l-4px">Mot de passe actuel</h6>
                <p class="description champ-required pb-2 p-l-4px">REQUIS</p>
                <div class="form-floating">
                    <input type="password" class="form-control form-control-lg mb-4" :class="hasError('currentPassword') ? 'is-invalid' : ''" id="floatingInputValue1" placeholder="MOT DE PASSE ACTUEL" name="currentPassword" v-model="formData.currentPassword"/>
                    <label for="floatingInputValue1">MOT DE PASSE ACTUEL*</label>
                </div>
                <h6 class="p-l-4px">Nouveau mot de passe</h6>
                <p class="description champ-required pb-2 p-l-4px">REQUIS</p>
                <div class="form-floating">
                    <input type="password" class="form-control form-control-lg mb-4" :class="hasError('newPassword') ? 'is-invalid' : ''" id="floatingInputValue2" placeholder="NOUVEAU MOT DE PASSE" name="newPassword" v-model="formData.newPassword"/>
                    <label for="floatingInputValue2">NOUVEAU MOT DE PASSE*</label>                   
                </div>
                <h6 class="p-l-4px">Confirmer le mot de passe</h6>
                <p class="p-l-4px description champ-required pb-2">REQUIS</p>
                <div class="form-floating">
                    <input type="password" class="form-control form-control-lg mb-4" :class="hasError('confirmPassword') ? 'is-invalid' : ''" id="floatingInputValue3" placeholder="COMFIRMER NOUVEAU MOT DE PASSE" name="confirmPassword" v-model="formData.confirmPassword"/>
                    <label for="floatingInputValue3">COMFIRMER NOUVEAU MOT DE PASSE*</label>
                    <small id="passwordHelp" class="text-danger" v-if="hasError('confirmPassword')">             
                        {{getError('confirmPassword')}}
                    </small> 
                </div>
                <input type="hidden" name="_token" :value="csrf">
            </div>
        </form>
    </div>
    <div class="col-1 border-seperate d-none-min-md">

    </div>

    <div class="col-5 d-none-min-md">
        <div class="password-information-section">
            <div class="title-section">
                <h6>Votre mot de passe</h6>
            </div>
            <div class="password-section">
                <p class="password-info">Votre mot de passe ne doit pas être le même que vos 5 derniers mots de passe utilisés</p>
                <p class="password-info">Votre mot de passe doit avoir 7+ caractères</p>
                <p class="password-info">Votre mot de passe doit avoir au moins 1 chiffre</p>
                <p class="password-info">Votre mot de passe ne doit contenir aucun espace</p>
            </div>
        </div>
    </div>
    <div class="col-1">
    </div>
</div>

    <div class="col mb-5 mt-4">
        <a type="button" class="btn btn-outline-info waves-effect mr-3">Annuler</a>
        <input type="submit" :disabled="hasAnyError" form="passwordForm" class="btn btn-info waves-effect waves-light ml-sm-0-max ml-sm-4 btn btn-info waves-effect waves-light ml-sm-0-max ml-sm-4 mb-sm-5-max" value="Confirmer">
    </div>
</template>

<script>
import FormEdit from '@/Components/FormEdit'
export default {
    components: { FormEdit },
    name: 'EditPasswordForm',
    mixins: [FormEdit],
    data(){
        return{
            modalID: null,
            whatIsChanging: 'Mot de passe',
            formData: {
                currentPassword: null,
                newPassword: null,
                confirmPassword: null,
            }
        }
    },
    methods:{
        storePassword(){
            this.post(route('profile.update.password'), this.formData);
         },   
    },
    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    },  
}
</script>