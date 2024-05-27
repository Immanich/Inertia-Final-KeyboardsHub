<script setup>
// import { Link } from 'vue'
import { Link, Head } from '@inertiajs/vue3'
import Navbar from '@/Layouts/Navbar.vue'

// import { Head, Link, useForm } from '@inertiajs/vue3';
</script>
<template>
    <Navbar>
        <Head title="Home" />
        <div class="container">
            <div class="wrapper px-80 py-52 h-screen text-white">
                <div class="flex justify-start ml-14">
                    <h2>WELCOME TO</h2>
                </div>
                <div class="flex justify-center ml-2">
                    <h1>KEYBOARD'S HUB</h1>
                    <!-- <h1>this is the home page</h1> -->
                </div>
            </div>
        </div>
    </Navbar>
</template>
<style scoped>
/* @font-face {
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
} */

h2 {
    animation: opening 1s ease-in-out;
    opacity: 0.7;
    transition: 500ms;
    cursor: pointer;
}

h2:hover {
    opacity: 1;
}

h1 {
    animation: openingTitle 2s ease-in-out;
    opacity: 0.7;
    transition: 500ms;
    cursor: pointer;
    
}

h1:hover {
    opacity: 1;
}



@keyframes opening {
    from {
        transform: translateX(-100%);
        opacity: 0;
        /* background-color: black; */
    }

    to {
        transform: translateX(0%);
        opacity: 0.7;
        /* background-color: black; */
    }
}

@keyframes openingTitle {
    0% {
        opacity: 0;
    }

    70% {
        opacity: 0;
    }

    100% {
        opacity: 0.7;
    }
}
.container {
    background-color: #060606;
}

h2 {
    font-size: 4rem;
    font-weight: 100;
}

h1 {
    font-size: 6rem;
    /* font-family: 'Inter'; */
    font-weight: bolder;
    /* color: ; */
}
</style>