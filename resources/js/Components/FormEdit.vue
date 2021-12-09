<template>
    
</template>

<script>
import FormErrors from '@/Components/FormErrors';
export default {
    components: { FormErrors },
    name: 'FormEdit',
    mixins: [FormErrors],
    data() {
        return{
            success: false,
            loading: false,
            error: false,
        }
    },

    methods: {
        post(routeName, data) {
            console.log(routeName);
            this.loading = true;
            let dt;
            if(data.email != null) {
                dt = data.email;
            } else if(data.username != null) {
                dt = data.username;
            }
            axios.post(routeName, data).then(response => {
                $(this.modalID).modal('hide');
                                
                this.onSuccess()
                if(dt != undefined)
                    this.emitToParent(dt);

                if(this.whatIsChanging == 'Card') {
                    toastr.success('Demande envoyée avec succès.')
                } else {
                    toastr.success(this.whatIsChanging + ' modifiée avec succès.')
                }
                this.loading = false
            }).catch(error => {
                console.log(error.response.status);
                if(error.response.status == 422) {
                    this.setErrors(error.response.data.errors)
                    this.loading = false
                } else {
                    this.onFailure(error.response.data.message)
                    this.loading = false

                }
            })
        },

        get(routeName, data) {
            this.loading = true;
            axios.get(route(routeName), data).then(response => {
                console.log(this.modalID);
                $(this.modalID).modal('hide');

                this.onSuccess(response.data.message)
                if(this.whatIsChanging == 'Card') {
                    toastr.success('Demande envoyée avec succès.')
                } else {
                    toastr.success(this.whatIsChanging + ' modifiée avec succès.')
                }
                                this.loading = false
            }).catch(error => {
                if(error.response.status == 422) {
                    this.setErrors(error.response.data.errors)
                    this.loading = false
                } else {
                    this.onFailure(error.response.data.message)
                    this.loading = false

                }
            })
        },

        onSuccess(message){
            this.reset()
            this.success = true;
        },

        onFailure(message){
            this.error = true;
        },

        reset() {
            this.clearAllErrors();
            for(let field in this.formData) {
                this.formData[field] = null;
            }
        },
    },
    mounted: function() {
        var vm = this;
        $(document).ready(function(){
            $(vm.modalID).on('hidden.bs.modal ', function (e) {
                console.log(vm.modalID + "has closed")
                vm.loading = false;
                vm.errors = {}
                for(let field in vm.formData) {
                    vm.formData[field] = null;
                }
            })
        })
    },

}
</script>