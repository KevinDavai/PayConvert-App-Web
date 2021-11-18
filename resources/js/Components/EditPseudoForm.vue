<template>
    <div class="modal-header d-flex justify-content-center">
        <p class="heading">
            Veuillez mettre à jour votre nom d'utilisateur
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

        <i class="fas fa-signature fa-4x animated rotateIn mb-4" :class="loading ? 'loading-modal-color-icon' : ''"></i>

        <div class="text-start" :class="loading ? 'opacity-02' : ''">
            <h5>Changer le nom d'utilisateur du compte</h5>

            <p>
                <span class="bold note">Remarque&nbsp;:</span>
                Vous ne pourrez pas changer de nom d'utilisateur
                pendant 30 jours après la validation du
                changement sur ce compte.
            </p>
        </div>
        <form enctype="multipart/form-data" class="form-floating" :action="route('profile.update.pseudo')" method="POST" id="nameForm" @submit.prevent="storePseudo" @keydown="clearError">
            <input type="text" class="form-control form-control-lg" :class="hasError('name') ? 'is-invalid' : ''" id="floatingInputValue" placeholder="NOUVEAU NOM D'UTILISATEUR" name="name" v-model="formData.name"/>
            <label for="floatingInputValue">NOUVEAU NOM D'UTILISATEUR</label>
            <small id="passwordHelp" class="text-danger" v-if="hasError('name')">             
                {{getError('name')}}
            </small> 
            <input type="hidden" name="_token" :value="csrf">
        </form>
    </div>

        <!--Footer-->
    <div class="modal-footer flex-center">    
        <input :disabled="hasAnyError" type="submit" form="nameForm" class="btn btn-info waves-effect waves-light" value="Confirmer">                    
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
    name: 'EditPseudoForm',
    mixins: [FormEdit],
    data(){
        return{
            modalID: '#nameModal',
            whatIsChanging: 'Nom d\'utilisateur',
            formData: {
                name: null,
            }
        }
    },
    methods:{
        storePseudo(){
            this.post(route('profile.update.pseudo'), this.formData);
         },   
    },
    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    },  
}
</script>