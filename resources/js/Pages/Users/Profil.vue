<template>
    <user-layout>
        <template #header>
            <h1 class="m-0"></h1>
        </template>

        <div class="container px-4">
            <div class="row gx-5">
                <div class="p-l-10px">
                    <div class="title-section">
                        <h3 class="title p-b-15px">Paramètres généraux</h3>
                        <p class="description description-profil-color p-b-15px">Gérez les détails de votre compte que vous avez partagés avec PaySafeConverter, y compris votre nom, vos coordonnées et plus encore</p>
                    </div>
                </div>
                <div class="col-10 col-sm-10 col-md-7 col-lg-4 col-xl-4 mb-3">
                    <form class="form-floating">
                        <input
                            type="text"
                            class="form-control form-control-lg"
                            id="floatingInputValue"
                            placeholder="example"
                            :value="this.user.username"
                            disabled=""
                        />
                        <label for="floatingInputValue">Nom d'utilisateur</label>
                    </form>
                </div>
                <div class="col-2">
                    <div
                        class="btn-group"
                        role="group"
                        aria-label="Third group"
                    >
                        <button
                            type="button"
                            class="btn btn-primary btn-edit"
                            data-toggle="modal"
                            data-target="#nameModal"
                        >
                            <i class="fas fa-pen"></i>
                        </button>
                    </div>
                </div>

                <div class="col-10 col-sm-10 col-md-7 col-lg-4 col-xl-4 mb-3">
                    <form class="form-floating">
                        <input
                            type="email"
                            class="form-control form-control-lg"
                            id="floatingInputValue"
                            placeholder="name@example.com"
                            :value="this.user.email"
                            disabled=""
                        />
                        <label for="floatingInputValue">Adresse Email</label>
                    </form>
                </div>
                <div class="col-2">
                    <div
                        class="btn-group"
                        role="group"
                        aria-label="Third group"
                    >
                        <button
                            type="button"
                            class="btn btn-primary btn-edit"
                            data-toggle="modal"
                            data-target="#emailModal"
                        >
                            <i class="fas fa-pen"></i>
                        </button>
                    </div>
                </div>

                <div class="p-l-10px">
                    <div class="title-section pt-5 pb-5">
                        <h3 class="title p-b-15px">Mot de passe</h3>
                        <p class="description description-profil-color p-b-15px">Pour votre sécurité, nous vous recommandons fortement de choisir un mot de passe unique que vous n'utilisez pour aucun autre compte en ligne.</p>
                    </div>
                </div>

                <EditPasswordForm>
                    
                </EditPasswordForm>
    
                               
            </div>
        </div>

        <!--Modal: modalPush-->
        <div class="modal fade" id="emailModal" tabindex="-2" role="dialog" aria-labelledby="example2ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                        <EditMailForm  v-on:childToParent="updateEmail">

                        </EditMailForm>
                </div>
            </div>
        </div>
        <!--Modal: modalPush-->
        <div class="modal fade" id="nameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                        <EditPseudoForm v-on:childToParent="updatePseudo">

                        </EditPseudoForm>
                </div>
            </div>
        </div>
    </user-layout>
</template>

<script>

import UserLayout from "@/Layouts/UserLayout";
import EditMailForm from "@/components/EditMailForm";
import EditPseudoForm from "@/components/EditPseudoForm";
import EditPasswordForm from "@/components/EditPasswordForm";
    export default {
        name: 'profil',
        components: { UserLayout, EditMailForm, EditPseudoForm, EditPasswordForm },
        data() {
            return {
                user: {},
            }
        },
        created() {
            this.getUserDetails();
        },
        methods: {
            getUserDetails() {
                axios.get(route('get_userProfil')).then((res) => {
                    console.log(this.user);
                    this.user = res.data.user;
                    console.log(res.data.user);

                });
            },

            updateEmail(value) {
                this.user.email = value;
            },

            updatePseudo(value) {
                this.user.username = value;
            }
            
        },
    };

</script>
