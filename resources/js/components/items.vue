<template>
   <div>
       <a class="btn btn-primary mb-2 text-white" @click="count++">Add Item</a>
       <template v-if="count > 0">
        <a class="btn btn-danger mb-2 text-white" @click="count--">Remove Last Item</a>
       </template>

       <template v-for="i in count">
           <div :key="'header-'+i" class="form-row">
               <h4  class="text-right text-muted col-12 bg-dark p-2">عنصر رقم {{ i + 4 }}</h4>
           </div>
           <div :key="'item-'+i" class="form-row">
                <div class="form-group col-md-4">
                    <label >الاسم</label>
                    <input type="text" class="form-control" :name="'items['+(i+3)+'][name]'" required />
                </div>
                <div class="form-group col-md-4">
                    <label >النوع</label>
                    <input type="text" class="form-control" :name="'items['+(i+3)+'][type]'" required />
                </div>
                <div class="form-group col-md-4">
                    <label >الكمية</label>
                    <input type="number" step="1" min="1" class="form-control" :name="'items['+(i+3)+'][quantity]'" required />
                </div>
                <div class="form-group col-md-4">
                    <label >المواصفات</label>
                    <input type="text" class="form-control" :name="'items['+(i+3)+'][details]'" required />
                </div>
                <div class="form-group col-md-4">
                    <label >الماركة</label>
                    <input type="text" class="form-control" :name="'items['+(i+3)+'][modal]'" required />
                </div>
                 <div class="form-group col-md-4">
                    <label >السعة التخزينية</label>
                    <input type="text" class="form-control" :name="'items['+(i+3)+'][storage]'" />
                </div>
           </div>

       </template>
   </div>
</template>

<script>
    export default {
        data() {
           return {
               count: 0,
           };
        }
    }
</script>
