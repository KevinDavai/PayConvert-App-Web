<template>
    <user-layout>
        <template #header>
            <h1 class="m-0"></h1>
        </template>

        <div class="container px-4">
            <div class="row gx-5">
                <div class="col">
                    <form class="form-floating">
                        <input
                            type="text"
                            class="form-control form-control-lg"
                            id="floatingInputValue"
                            placeholder="example"
                            :value="`${$page.props.user.name}`"
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

                <div class="col">
                    <form class="form-floating">
                        <input
                            type="email"
                            class="form-control form-control-lg"
                            id="floatingInputValue"
                            placeholder="name@example.com"
                            :value="`${$page.props.user.email}`"
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
            </div>
        </div>

        <!--Modal: modalPush-->
        <div class="modal fade" id="emailModal" tabindex="-2" role="dialog" aria-labelledby="example2ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                        <EditMailForm>

                        </EditMailForm>
                </div>
            </div>
        </div>
        <!--Modal: modalPush-->
        <div class="modal fade" id="nameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                        <EditPseudoForm>

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
    export default {
        components: { UserLayout, EditMailForm, EditPseudoForm },
    };

</script>
