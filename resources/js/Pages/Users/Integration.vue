<template>
    <user-layout>
        <template #header>
            <h1 class="m-0"></h1>
        </template>

        <div class="container mt-4">
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col mb-4 d-flex align-items-stretch">
                    <div class="card align-items-center width-20em">
                        <img src="/storage/images/Integrations/Google__G__Logo.svg.png" class="mt-5 card-img-top image-card-integration" alt="Google Logo">
                        <div class="card-body d-flex align-items-center flex-column">
                            <h5 class="card-title font-weight-bold mb-3">GOOGLE</h5>
                            <p v-if="$page.props.user.google_id != null" class="card-text font-weight-bold mb-5">User Pseudo</p>
                            <p v-else class="card-text font-weight-bold mb-5"></p>
                            <div class="btn-group" role="group" aria-label="Third group">
                                <button type="button" class="btn btn-info waves-effect waves-light">
                                    <p class="m-0">Connexion</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-4 d-flex align-items-stretch">
                    <div class="card align-items-center width-20em">
                        <img src="/storage/images/Integrations/Steam_icon_logo.svg.png" class="mt-5 card-img-top image-card-integration" alt="Google Logo">
                        <div class="card-body d-flex align-items-center flex-column">
                            <h5 class="card-title font-weight-bold mb-3">STEAM</h5>
                            <p class="card-text font-weight-bold mb-5">User Pseudo</p>
                            <div class="btn-group" role="group" aria-label="Third group">
                                <button type="button" class="btn btn-info waves-effect waves-light">
                                    <p class="m-0">Connexion</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-4 d-flex align-items-stretch">
                    <div class="card align-items-center width-20em">
                        <img src="/storage/images/Integrations/Github__Logo.png" class="mt-5 card-img-top image-card-integration" alt="Google Logo">
                        <div class="card-body d-flex align-items-center flex-column">
                            <h5 class="card-title font-weight-bold mb-3">GITHUB</h5>
                            <p class="card-text font-weight-bold mb-5">User Pseudo</p>
                            <div class="btn-group" role="group" aria-label="Third group">
                                <button type="button" class="btn btn-info waves-effect waves-light">
                                    <p class="m-0">Connexion</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-4 d-flex align-items-stretch">
                    <div class="card align-items-center width-20em">
                        <img src="/storage/images/Integrations/discord-512.webp " class="mt-5 card-img-top image-card-integration" alt="Google Logo">
                        <div class="card-body d-flex align-items-center flex-column">
                            <h5 class="card-title font-weight-bold mb-3">DISCORD</h5>
                            <p class="card-text font-weight-bold mb-5">User Pseudo</p>
                            <div class="btn-group" role="group" aria-label="Third group">
                                <button type="button" class="btn btn-info waves-effect waves-light">
                                    <p class="m-0">Connexion</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </user-layout>
</template>

<script>

import UserLayout from "@/Layouts/UserLayout";
    export default {
        components: { UserLayout },
    };

</script>
