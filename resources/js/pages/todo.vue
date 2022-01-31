<template>
  <div class="row">
    <div class="col-lg-10 m-auto d-flex justify-content-center">
      <card title="todo">
        <!-- <fa icon="plus" class="fs-2" /> -->
        <card title="New Note" class="mx-3">
          <form @submit.prevent="submitNote" @keydown="form.onKeydown($event)">
            <alert-success :form="form" :message="'Added New Note'" />
            <!-- title -->
            <div class="mb-3 row">
              <label class="col-md-3 col-form-label text-md-end">Title</label>
              <div class="col-md-7">
                <input v-model="form.title" :class="{ 'is-invalid': form.errors.has('title') }" class="form-control" type="text" title="title">
                <has-error :form="form" field="title" />
              </div>
            </div>

            <!-- content -->
            <div class="mb-3 row">
              <label class="col-md-3 col-form-label text-md-end">Content</label>
              <div class="col-md-7">
                <input v-model="form.content" :class="{ 'is-invalid': form.errors.has('content') }" class="form-control" type="content" title="content">
                <has-error :form="form" field="content" />
              </div>
            </div>

            <!-- Submit Button -->
            <div class="mb-3 row">
              <div class="col-md-9 ms-md-auto">
                <v-button :loading="form.busy" type="success">
                  <div v-if="activeEdit">
                    Update Note
                  </div>
                  <div v-else>
                    Add Note
                  </div>
                </v-button>
                <v-button type="reset" class="btn-danger" @click="resetForm">
                  {{ "Reset" }}
                </v-button>
              </div>
            </div>
          </form>
        </card>

        <!-- Notes -->
        <ul v-for="{id, title, content, created_at} in notes.slice().reverse()" :key="title" class="mx-3 my-2">
          <li :key="id" class="list-group-item">
            <div class="row d-flex justify-content-between">
              <div class="col-md-9">
                <h5 class="mb-1">
                  {{ title }}
                </h5>
                <p class="mb-1">
                  {{ content }}
                </p>
                <small>{{ created_at }}</small>
              </div>
              <div class="col-md-auto d-flex flex-column justify-content-center">
                <button class="btn btn-danger btn-sm my-1" @click="deleteNote(id)">
                  <fa icon="trash" />
                </button>
                <button class="btn btn-primary btn-sm my-1" @click="editNote(id)">
                  <fa icon="edit" />
                </button>
              </div>
            </div>
          </li>
        </ul>
      </card>
    </div>
  </div>
</template>

<script>
import Form from 'vform'

import axios from 'axios'
export default {
  middleware: 'auth',

  async asyncData () {
    const { data: notes } = await axios.get('/api/note')

    return {
      notes
    }
  },
  data: () => ({
    form: new Form({
      title: '',
      content: ''
    }),
    activeEdit: false,
    alert: false
  }),
  metaInfo () {
    return { title: 'Todo' }
  },

  methods: {
    async deleteNote (id) {
      if (confirm('Do you really want to delete this note?')) {
        await axios.delete('/api/note/' + id)
        this.notes = this.notes.filter(note => note.id !== id)
      }
    },
    async editNote (id) {
      console.log(id)
      const { data: note } = await axios.get('/api/note/' + id)
      this.form.title = note.title
      this.form.content = note.content
      this.form.id = note.id
      this.activeEdit = true
    },
    async submitNote () {
      if (this.activeEdit) {
        this.notes = this.notes.map(note => {
          if (note.id === this.form.id) {
            note.title = this.form.title
            note.content = this.form.content
          }
          return note
        })
        await axios.put('/api/note/' + this.form.id, this.form)
        this.activeEdit = false
      } else {
        const { data } = await axios.post('/api/note', this.form)
        this.notes.push(data)
        this.form.busy = false
      }
      this.form.reset()
    },
    resetForm () {
      this.form.reset()
    }
  }
}
</script>

<style>
  ul {
    padding-left:0;
  }
</style>
