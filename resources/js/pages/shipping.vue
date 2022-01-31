<template>
  <div class="row">
    <div class="col-lg-10 m-auto d-flex justify-content-center">
      <card title="shipping" class="w-50">
        <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)">
          <alert-success :form="form" :message="'Hello Shippers!'" />
          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">Full Name</label>
            <div class="col-md-7">
              <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" title="name">
              <has-error :form="form" field="name" />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">Address</label>
            <div class="col-md-7">
              <input v-model="form.address1" :class="{ 'is-invalid': form.errors.has('address1') }" class="form-control" type="text" title="address1">
              <has-error :form="form" field="address1" />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">Address 2</label>
            <div class="col-md-7">
              <input v-model="form.address_2" :class="{ 'is-invalid': form.errors.has('address_2') }" class="form-control" type="text" title="address_2">
              <has-error :form="form" field="address_2" />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">City</label>
            <div class="col-md-7">
              <input v-model="form.city" :class="{ 'is-invalid': form.errors.has('city') }" class="form-control" type="text" title="city">
              <has-error :form="form" field="city" />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">State</label>
            <div class="col-md-7">
              <input v-model="form.provice_code" :class="{ 'is-invalid': form.errors.has('provice_code') }" class="form-control" type="text" title="provice_code">
              <has-error :form="form" field="provice_code" />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">Zip Code</label>
            <div class="col-md-7">
              <input v-model="form.postal_code" :class="{ 'is-invalid': form.errors.has('postal_code') }" class="form-control" type="text" title="postal_code">
              <has-error :form="form" field="postal_code" />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">Weight</label>
            <div class="col-md-7">
              <input v-model="form.weight" :class="{ 'is-invalid': form.errors.has('weight') }" class="form-control" type="text" title="weight">
              <has-error :form="form" field="weight" />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">Weight Unit</label>
            <div class="col-md-7">
              <select v-model="form.weight_unit" :class="{ 'is-invalid': form.errors.has('weight_unit') }" class="form-control" title="weight_unit">
                <option value="lbs">
                  lbs
                </option>
                <option value="kg">
                  kg
                </option>
                <option value="g">
                  g
                </option>
                <option value="oz">
                  oz
                </option>
              </select>
              <has-error :form="form" field="weight_unit" />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">L x W x H</label>
            <div class="col-md-3 d-flex">
              <input v-model="form.length" :class="{ 'is-invalid': form.errors.has('length') }" class="form-control col-md-2 py-auto my-auto mx-1" type="text" title="length">
              <has-error :form="form" field="length" />
              <input v-model="form.width" :class="{ 'is-invalid': form.errors.has('width') }" class="form-control col-md-2 py-auto my-auto mx-1" type="text" title="width">
              <has-error :form="form" field="width" />
              <input v-model="form.height" :class="{ 'is-invalid': form.errors.has('height') }" class="form-control col-md-2 py-auto my-auto mx-1" type="text" title="height">
              <has-error :form="form" field="height" />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">Size Unit</label>
            <div class="col-md-7">
              <div class="form-check">
                <input v-model="form.size_unit" :class="{ 'is-invalid': form.errors.has('size_unit') }" class="form-check-input" type="radio" name="size_unit" value="cm" title="size_unit">
                <label class="form-check-label" for="size_unit">Centimeters</label>
              </div>
              <div class="form-check">
                <input v-model="form.size_unit" :class="{ 'is-invalid': form.errors.has('size_unit') }" class="form-check-input" type="radio" name="size_unit" value="in" title="size_unit">
                <label class="form-check-label" for="size_unit">Inches</label>
              </div>
              <has-error :form="form" field="size_unit" />
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">Package Contents</label>
            <div class="col-md-7">
              <input v-model="form.package_contents" :class="{ 'is-invalid': form.errors.has('package_contents') }" class="form-control" type="text" title="package_contents">
              <has-error :form="form" field="package_contents" />
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">Value</label>
            <div class="col-md-7">
              <input v-model="form.value" :class="{ 'is-invalid': form.errors.has('value') }" class="form-control" type="text" title="value">
              <has-error :form="form" field="value" />
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">Currency</label>
            <div class="col-md-7">
              <div class="form-check">
                <input v-model="form.currency" :class="{ 'is-invalid': form.errors.has('currency') }" class="form-check-input" type="radio" name="currency" value="CAD" title="currency">
                <label class="form-check-label" for="currency">CAD</label>
              </div>
              <div class="form-check">
                <input v-model="form.currency" :class="{ 'is-invalid': form.errors.has('currency') }" class="form-check-input" type="radio" name="currency" value="USD" title="currency">
                <label class="form-check-label" for="currency">USD</label>
              </div>
              <has-error :form="form" field="currency" />
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">Package Type</label>
            <div class="col-md-7">
              <select v-model="form.package_type" :class="{ 'is-invalid': form.errors.has('package_type') }" class="form-control" title="package_type">
                <option value="parcel">
                  Parcel
                </option>
                <option value="legal_flat_rate_envelope">
                  Legal Flat Rate Envelope
                </option>
                <option value="flat_rate_padded_envelope">
                  Flat Rate Padded Envelope
                </option>
                <option value="small_flat_rate_box">
                  Small Flat Rate Box
                </option>
                <option value="medium_flat_rate_box_1">
                  Medium Flat Rate Box 1
                </option>
                <option value="medium_flat_rate_box_2">
                  Medium Flat Rate Box 2
                </option>
                <option value="large_flat_rate_box">
                  Large Flat Rate Box
                </option>
                <option value="regional_rate_box_a1">
                  Regional Rate Box A1
                </option>
                <option value="regional_rate_box_a2">
                  Regional Rate Box A2
                </option>
                <option value="regional_rate_box_b1">
                  Regional Rate Box B1
                </option>
                <option value="regional_rate_box_b2">
                  Regional Rate Box B2
                </option>
                <option value="letter">
                  Letter
                </option>
                <option value="large_envelope_or_flat">
                  Large Envelope or Flat
                </option>
                <option value="thick_envelope">
                  Thick Envelope
                </option>
              </select>
              <has-error :form="form" field="package_type" />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-md-3 col-form-label text-md-end">Region</label>
            <div class="col-md-7">
              <select v-model="form.region" :class="{ 'is-invalid': form.errors.has('region') }" class="form-control" title="region">
                <option value="BC">
                  BC
                </option>
                <option value="ON">
                  ON
                </option>
              </select>
              <has-error :form="form" field="region" />
            </div>
          </div>
          <!-- Submit -->
          <div class="mb-3 row">
            <div class="col-md-9 ms-md-auto">
              <v-button :loading="form.busy" type="success" @click="submitForm">
                {{ "Submit" }}
              </v-button>
              <v-button type="reset" class="btn-danger" @click="resetForm">
                {{ "Reset" }}
              </v-button>
            </div>
          </div>
        </form>
      </card>
      <card title="Shipping Rates" class="w-50 mx-2">
        <!-- Display Rate Information       "postage_type"
      "package_type"
      "base_rate"
      "rate"
      "tax"
      "total"
      "currency"
      "delivery_days" -->

        <div class="mb-3 row">
          <label class="col-md-4 text-md-end">Package Type: </label>
          <div class="col-md-7 text-md-center border border-1 rounded-2">
            {{ form.package_type }}
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-md-4 text-md-end">Base Rate: </label>
          <div class="col-md-7 text-md-center border border-1 rounded-2">
            {{ form.base_rate }}
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-md-4 text-md-end">Rate: </label>
          <div class="col-md-7 text-md-center border border-1 rounded-2">
            {{ form.rate }}
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-md-4 text-md-end">Tax: </label>
          <div class="col-md-7 text-md-center border border-1 rounded-2">
            {{ form.tax }}
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-md-4 text-md-end">Total: </label>
          <div class="col-md-7 text-md-center border border-1 rounded-2">
            {{ form.total }}
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-md-4 text-md-end">Currency: </label>
          <div class="col-md-7 text-md-center border border-1 rounded-2">
            {{ form.currency }}
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-md-4 text-md-end">Delivery Days: </label>
          <div class="col-md-7 text-md-center border border-1 rounded-2">
            {{ form.delivery_days }}
          </div>
        </div>
      </card>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import Form from 'vform'

export default {
  data: () => ({
    form: new Form({
      name: '',
      weight: '',
      weight_unit: 'kg',
      length: '',
      width: '',
      height: '',
      size_unit: 'cm',
      package_contents: '',
      value: '',
      currency: 'CAD',
      package_type: 'parcel',
      region: 'ON'
    })
  }),
  methods: {
    resetForm () {
      this.form.reset()
    },
    async submitForm () {
      this.form.busy = true
      await axios.post('https://sandbox.stallionexpress.ca/api/v3', this.form, { headers: { 'Content-Type': 'application/json', 'Access-Control-Allow-Origin': '*', Authorization: 'Bearer ' + process.env.STALLION_EXPRESS_TOKEN } })
        .then(response => {
          this.form.busy = false
          this.$toast.success('Shipping rates successfully submitted')
        })
    }

  }
}
</script>
