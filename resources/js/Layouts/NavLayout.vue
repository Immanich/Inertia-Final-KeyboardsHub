<script setup>
// import { Link } from '@inertiajs/vue3';
// export default {
//     name: 'Navigation'
// }
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <div class="w-full h-full">
        <div class="p-4 bg-gradient-3-color">
            <div class="flex items-center gap-7 text-white opacity-60 tracking-widest font-extralight">
                <Link :href="route('open')" class="flex cursor-pointer flex-1 text-5xl">KEYBOARD'S HUB</Link>
                <!-- <Link :href="route('home')" class="flex cursor-pointer text-2xl">HOME</Link>
                <Link href="/" class="flex cursor-pointer text-2xl">KEYBOARDS</Link>
                <Link href="#" class="flex cursor-pointer text-2xl">ABOUT</Link> -->
            </div>
        </div>
        <div class="w-full min-h-screen">
            <slot />
        </div>
    </div>
</template>
<style scoped>
#home {
    font-size: 100px;
    margin-left: 20rem;
}
</style>