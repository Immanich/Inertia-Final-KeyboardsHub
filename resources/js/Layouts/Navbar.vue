<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>
<template>
    <div class="container w-full h-full">
        <div class="p-4 bg-gradient-3-color">
            <div class="flex items-center gap-7 text-white opacity-60 tracking-widest font-extralight">
                <Link :href="route('home')" id="heading" class="flex cursor-pointer flex-1 text-5xl">KEYBOARD'S HUB
                </Link>
                <Link :href="route('home')" class="flex cursor-pointer text-2xl">HOME</Link>
                <Link :href="route('index')" class="flex cursor-pointer text-2xl">KEYBOARDS</Link>
                <Link href="/about" class="flex cursor-pointer text-2xl">ABOUT</Link>
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <div class="ms-3 relative">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-transparent hover:text-gray-700 hover:bg-neutral-950 hover:text-white focus:outline-none transition ease-in-out duration-150">
                                        {{ $page.props.auth.user.name }}

                                        <svg class="-me-0.5 h-8 w-8" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                <DropdownLink :href="route('logout')" method="post" as="button">
                                    Log Out
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>
                </div>

                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="showingNavigationDropdown = !showingNavigationDropdown"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{
                    hidden: showingNavigationDropdown,
                    'inline-flex': !showingNavigationDropdown,
                }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{
                    hidden: !showingNavigationDropdown,
                    'inline-flex': showingNavigationDropdown,
                }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-full min-h-screen">
            <slot />
        </div>
    </div>
</template>
<style scoped>
#heading {
    font-size: 3rem;
    font-weight: 900;
}
</style>