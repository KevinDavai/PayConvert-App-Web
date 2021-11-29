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

                <div class="row justify-content-between">
                    <div class="col">
                        <convertiForm></convertiForm>
                     
                    </div>
                </div>
            
    
                               
            </div>
        </div>

    </user-layout>
</template>

<script>

import UserLayout from "@/Layouts/UserLayout";
import convertiForm from "@/Components/PostCardForm"
export default {
    components: { UserLayout, convertiForm },
};

</script>
