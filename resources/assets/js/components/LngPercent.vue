<template id="progress-ring">
  <svg class="progress-ring" viewBox="-50,-50,100,100">
    <circle class="progress-ring-circle" r="46"/>
    <path class="progress-ring-ring" :d="path"/>
    <circle class="progress-ring-end" :cx="endX" :cy="endY" r="4"/>
    <text class="size-text" alignment-baseline="middle" text-anchor="middle">{{ text }}</text>
  </svg>
</template>

<script>
    export default {
        props: {
            value: {
            type: null,
            default: 0,
            },
            min: {
            type: Number,
            default: 0,
            },
            max: {
            type: Number,
            default: 1,
            },
            text: {
            type: null,
            default: '',
            }
        },
        computed: {
            theta() {
            const frac = ((this.value-0.01) - this.min) / (this.max - this.min) || 0;
            return frac * 2 * Math.PI;
            },
            path() {
            const large = this.theta > Math.PI;
            return `M0,-46 A46,46,0,${large ? 1 : 0},1,${this.endX},${this.endY}`;
            },
            endX() {
            return Math.cos(this.theta - Math.PI * 0.5) * 46;
            },
            endY() {
            return Math.sin(this.theta - Math.PI * 0.5) * 46;
            }
        }
    }
</script>


<style>
.progress-ring {
  width: 200px;
  height: 200px;
}

.progress-ring-circle {
  stroke: rgba(0, 0, 0, 0.1);
  stroke-width: 1;
  fill: none;
}

.progress-ring-ring {
  stroke: #007fff;
  stroke-width: 2;
  fill: none;
}

.progress-ring-end {
  fill: #007fff;
}

.size-text {
    font-size: 14px;
}
</style>