<script setup lang="ts">
import { cn } from '@/lib/utils';
import { onMounted, onBeforeUnmount, ref } from 'vue';
import * as THREE from 'three';

const props = defineProps<{
    className?: string;
    theme?: 'dark' | 'light';
}>();

const containerRef = ref<HTMLDivElement | null>(null);
const sceneRef = ref<{
    scene: THREE.Scene;
    camera: THREE.PerspectiveCamera;
    renderer: THREE.WebGLRenderer;
    particles: THREE.Points[];
    animationId: number;
    count: number;
} | null>(null);

onMounted(() => {
    if (!containerRef.value) return;

    const SEPARATION = 100;
    const AMOUNTX = 50;
    const AMOUNTY = 50;

    // Scene setup
    const scene = new THREE.Scene();
    // scene.fog = new THREE.Fog(0xffffff, 2000, 10000); // White fog
    // We want dark fog/background for this theme usually, but renderer is transparent.

    const camera = new THREE.PerspectiveCamera(
        75,
        window.innerWidth / window.innerHeight,
        1,
        10000,
    );
    // Position camera to look at the points
    camera.position.set(0, 355, 1220);

    const renderer = new THREE.WebGLRenderer({
        alpha: true,
        antialias: true,
    });
    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.setSize(window.innerWidth, window.innerHeight);
    
    containerRef.value.appendChild(renderer.domElement);

    // Create particles
    const positions: number[] = [];
    const colors: number[] = [];

    // Create geometry for all particles
    const geometry = new THREE.BufferGeometry();

    for (let ix = 0; ix < AMOUNTX; ix++) {
        for (let iy = 0; iy < AMOUNTY; iy++) {
            const x = ix * SEPARATION - (AMOUNTX * SEPARATION) / 2;
            const y = 0; // Will be animated
            const z = iy * SEPARATION - (AMOUNTY * SEPARATION) / 2;

            positions.push(x, y, z);
            
            // Always use white for now to ensure visibility on dark background
            colors.push(1, 1, 1);
        }
    }

    geometry.setAttribute(
        'position',
        new THREE.Float32BufferAttribute(positions, 3),
    );
    geometry.setAttribute('color', new THREE.Float32BufferAttribute(colors, 3));

    // Create material
    const material = new THREE.PointsMaterial({
        size: 4, // Smaller dots for elegance
        vertexColors: true,
       // transparent: true,
      //  opacity: 0.5,
    });

    // Create points object
    const points = new THREE.Points(geometry, material);
    scene.add(points);

    let count = 0;
    let animationId: number;

    // Animation function
    const animate = () => {
        animationId = requestAnimationFrame(animate);

        const positionAttribute = geometry.attributes.position;
        const positions = positionAttribute.array as Float32Array;

        let i = 0;
        for (let ix = 0; ix < AMOUNTX; ix++) {
            for (let iy = 0; iy < AMOUNTY; iy++) {
                const index = i * 3;

                // Animate Y position with sine waves
                positions[index + 1] =
                    Math.sin((ix + count) * 0.3) * 50 +
                    Math.sin((iy + count) * 0.5) * 50;

                i++;
            }
        }

        positionAttribute.needsUpdate = true;
        
        // Rotate the scene slightly or just render
        // scene.rotation.y += 0.001;

        renderer.render(scene, camera);
        count += 0.1;
    };

    // Handle window resize
    const handleResize = () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    };

    window.addEventListener('resize', handleResize);

    // Start animation
    animate();

    // Store references
    sceneRef.value = {
        scene,
        camera,
        renderer,
        particles: [points],
        animationId,
        count,
    };
});

onBeforeUnmount(() => {
    window.removeEventListener('resize', () => {}); // Need actual function ref to remove correctly but simplified here

    if (sceneRef.value) {
        cancelAnimationFrame(sceneRef.value.animationId);

        // Clean up Three.js objects
        sceneRef.value.scene.traverse((object) => {
            if (object instanceof THREE.Points) {
                object.geometry.dispose();
                if (Array.isArray(object.material)) {
                    object.material.forEach((material) => material.dispose());
                } else {
                    object.material.dispose();
                }
            }
        });

        sceneRef.value.renderer.dispose();

        if (containerRef.value && sceneRef.value.renderer.domElement) {
            containerRef.value.removeChild(
                sceneRef.value.renderer.domElement,
            );
        }
    }
});
</script>

<template>
    <div
        ref="containerRef"
        :class="cn('pointer-events-none absolute inset-0 -z-10', props.className)"
    ></div>
</template>
