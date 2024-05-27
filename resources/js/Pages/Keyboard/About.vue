<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import Navbar from '@/Layouts/Navbar.vue';
</script>

<template>
    <Navbar>

        <Head title="About" />
        <div class="container h-full min-h-screen w-full">
            <div class="wrapper h-full min-h-screen p-8 text-white">
                <div class="keyboards-category block h-max">
                    <div class="heading w-full text-center">
                        <h2>Welcome to Keyboard's Hub</h2>
                        <h3 class="sub">
                            Your ultimate destination for all things keyboards! Whether you're a tech enthusiast, a<br>
                            music lover, or someone looking to improve your typing skills, Keyboard's Hub has something
                            for everyone.
                        </h3>
                    </div>
                    <div class="content p-8">
                        <h3 class="text-xl font-bold mb-4">For Computer Enthusiasts</h3>
                        <p>
                            We offer comprehensive reviews, comparisons, and buying guides for a wide range of computer
                            keyboards. Discover the latest innovations in mechanical keyboards, gaming keyboards,
                            ergonomic designs, and more. Make informed decisions and find the perfect keyboard to suit
                            your needs.
                        </p>
                        <h3 class="text-xl font-bold mt-8 mb-4">For Music Aficionados</h3>
                        <p>
                            Explore electronic pianos, synthesizers, MIDI controllers, and beyond. Dive into product
                            reviews, tutorials, software recommendations, and tips for music production and performance.
                        </p>
                        <h3 class="text-xl font-bold mt-8 mb-4">For Typing Enthusiasts</h3>
                        <p>
                            Sharpen your keyboarding skills with interactive lessons, speed tests, and fun exercises
                            designed to boost your efficiency and productivity.
                        </p>
                        <h3 class="text-xl font-bold mt-8 mb-4">Join Our Community</h3>
                        <p>
                            Join our vibrant community of keyboard enthusiasts, share your experiences, and stay updated
                            with the latest trends and developments in the world of keyboards. Whether you're a beginner
                            or a seasoned pro, Keyboard's Hub is your go-to hub for everything keyboards!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </Navbar>
</template>

<style scoped>
.container {
    background-color: #060606;
    overflow: hidden;
    height: auto;
    min-height: fit-content;
}

h2 {
    /* font-variant: upp; */
    text-transform: uppercase;
    animation: opening 1s ease-in-out;
}

.sub {
    animation: forP 2s ease-in-out;
}

h3 {
    animation: forP 12s ease-in-out;
}

p {
    animation: forP 20s ease-out;
}

@keyframes opening {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }

    to {
        transform: translateX(0%);
        opacity: 1;
    }
}

@keyframes forP {
    0% {
        /* transform: translateX(-100%); */
        opacity: 0;
    }

    70% {
        /* transform: translateX(0%); */
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

.heading h2 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.content {
    max-width: 800px;
    margin: 0 auto;
}
</style>
