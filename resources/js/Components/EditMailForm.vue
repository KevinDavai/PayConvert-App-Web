<template>
    <div class="modal-header d-flex justify-content-center">
        <p class="heading">
            Veuillez mettre à jour votre adresse e-mail
        </p>
    </div>
    <!--Body-->
    <svg v-if="loading" class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
        <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
    </svg>
    <div class="modal-body">

    <!--<div class="alert alert-success" v-if="success">
        Email modifié avec succes
    </div>-->

        <i class="fas fa-envelope fa-4x animated rotateIn mb-4" :class="loading ? 'loading-modal-color-icon' : ''"></i>

        <div class="text-start" :class="loading ? 'opacity-02' : ''">
            <h5>Changer l'adresse e-mail du compte</h5>

            <p>
                <span class="bold note">Remarque&nbsp;:</span>
                Vous ne pourrez pas changer d'adresse e-mail
                pendant 30 jours après la validation du
                changement sur ce compte.
            </p>
        </div>
        <form enctype="multipart/form-data" class="form-floating" :action="route('profile.update.email')" method="POST" id="emailForm" @submit.prevent="storeEmail" @keydown="clearError">
            <input type="email" class="form-control form-control-lg" :class="hasError('email') ? 'is-invalid' : ''" id="floatingInputValue" placeholder="NOUVELLE ADRESSE E-MAIL" name="email" v-model="formData.email"/>
            <label for="floatingInputValue">NOUVELLE ADRESSE E-MAIL</label>
            <small id="passwordHelp" class="text-danger" v-if="hasError('email')">             
                {{getError('email')}}
            </small> 
            <input type="hidden" name="_token" :value="csrf">
        </form>
    </div>

        <!--Footer-->
    <div class="modal-footer flex-center">    
        <input :disabled="hasAnyError" type="submit" form="emailForm" class="btn btn-info waves-effect waves-light" value="Confirmer">                    
        <a
            type="button"
            class="btn btn-outline-info waves-effect"
            data-dismiss="modal"
            @click.prevent="reset"
            >Annuler</a
        >
    </div>
</template>

<script>
import FormEdit from '@/Components/FormEdit'
export default {
    components: { FormEdit },
    name: 'EditMailForm',
    mixins: [FormEdit],
    emits: ["childToParent"],
    data(){
        return{
            modalID: '#emailModal',
            whatIsChanging: 'email',
            formData: {
                email: null,
            },
            newEmail: null,
        }
    },
    methods:{
        storeEmail(){
            this.post(route('profile.update.email'), this.formData)
         },   
        emitToParent (value) {
            this.$emit('childToParent', value)
        }
    },  
    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    }, 
     
}
</script>