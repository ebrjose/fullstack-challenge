<template>
  <div v-if="show" class="modal-mask">
    <div class="modal-wrapper">
      <div class="modal-container rounded" v-click-outside="hideModal">
        <div class="modal-header">
          <slot name="header"></slot>
        </div>

        <div class="modal-body">
          <slot name="body"></slot>
        </div>

        <div class="modal-footer">
          <slot name="footer">
            <div class="text-center">
              <button-field class="px-10" @click="$emit('close-modal')">Ok</button-field>
            </div>
          </slot>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ButtonField from '@/components/forms/ButtonField.vue'

export default {
  components: {
    ButtonField,
  },
  props: ['show'],
  methods: {
    hideModal() {
      this.emitter.emit('show-modal', false)
    },
  },
}
</script>
<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 300px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-enter-active,
.modal-leave-active {
  transition: opacity 0.5s ease;
}

.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}
</style>
