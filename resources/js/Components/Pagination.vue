<template>
    <div class='VuePagination' :class='props.theme.wrapper'>
        <nav :class='props.theme.nav' class="px-4">

            <ul v-show="props.showPagination" :class="props.theme.list" style="display: flex; margin: 0px; justify-content: space-between;">

              


                <li :class="props.theme.prev" @click="props.setPrevPage">
                    <button type="button" class="left-page-btn">{{props.texts.prevPage}}</button>
                </li>


                <li :class="props.theme.next" @click="props.setNextPage">
                    <button type="button" class="right-page-btn">{{props.texts.nextPage}}</button>
                </li>


        

            </ul>


        </nav>
    </div>

</template>

<script>
    export default {
        name: 'MyPagination',
        props: ['props']
    }
</script>