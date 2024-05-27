<script setup>
// import { Link } from 'vue'
import { Link, Head } from '@inertiajs/vue3'

// import { Head, Link, useForm } from '@inertiajs/vue3';
</script>
<template>
    <Head title="Greetings!" />
    <div class="container">
        <div class="wrapper px-80 py-52 h-screen text-white">
            <div class="flex justify-start ml-14">
                <h2>WELCOME TO</h2>
            </div>  
            <div class="flex justify-center ml-2">
                <h1>KEYBOARD'S HUB</h1>
            </div>
            <div class="btns flex justify-evenly">
                <Link :href="route('loginhub')" class="opacity-60 hover:opacity-80 duration-500">LOGIN</Link>
                <Link :href="route('create')" class="opacity-60 hover:opacity-80 duration-500">SIGN UP</Link>
            </div>
        </div>
    </div>
</template>
<style scoped>
@font-face {
    font-family: 'Inter';
    src: url('../fonts/Inter-ExtraLight.ttf') format('ttf');
    font-weight: 200;
    font-style: normal;
}

@font-face {
    font-family: 'Inter';
    src: url('../fonts/Inter-Bold.ttf') format('ttf');
    font-weight: bold;
    font-style: normal;
}

.container {
    background-color: #060606;
    /* color: #fff; */
}
h2 {
    font-size: 4rem;
    /* font-family: 'Inter'; */
    font-weight: 100; 
}

h1 {
    font-size: 6rem;
    /* font-family: 'Inter'; */
    font-weight: bolder; 
    color: ;
}
</style>