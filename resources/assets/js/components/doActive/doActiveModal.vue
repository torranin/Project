<template>

    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">เพิ่มข้อมูล</h5>
        </div>

            <div class="modal-body">

                <div class="form-group">
                    <Autocomplete :activitys="activitys" v-model="value.problemsDetail"></Autocomplete>
                </div>

                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="สาเหตุ" v-model="value.cause"></textarea>
                </div>

                <div class="form-group">
                    <textarea class="form-control" rows="3" v-model="value.editing" placeholder="การแก้ไข"></textarea>
                </div>

                <select class="form-control" v-model="value.groupId">
                    <option value="">หน่วยงาน</option>
                    <option v-for="(item, index) in groups" :key="index" v-bind:value="item.id">{{item.groupName}}</option>
                </select>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="onSave">บันทึก</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
    </div>

</template>

<script>
    import Autocomplete from '../Autocomplete'
    export default {
        components: {
            Autocomplete
        },
        props: {
            data: {
                type: Object,
                default: function () {
                    return {
                        problemsDetail: '',
                        cause: '',
                        editing: '',
                        groupId: '',
                    }
                }
            },
            activity: {
                type: Array,
                default: function () {
                    return []
                }
            },
            groups: {
                type: Array,
                default: function () {
                    return []
                }
            },
        },
        data(){
            return {
                value: this.data,
                selection: '',
                activitys: this.activity,
                group: this.groups
            }
        },
        methods: {
            onSave() {
                axios.post('/doActive/create', this.value).then((response) => {
                    window.location.href = "/doActive"
                }, (response) => {
                    console.log(response);
                })
            },

        }
    }
</script>