<template>

    <div class="form-horizontal">

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">แก้ไขข้อมูล</div>

                        <div class="panel-body">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <Autocomplete :activitys="activitys" v-model="value.problemsDetail"></Autocomplete>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="สาเหตุ" v-model="value.cause"></textarea>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" rows="3" v-model="value.editing" placeholder="การแก้ไข"></textarea>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" v-model="value.groupId">
                                        <option value="">เลือกหน่วยงาน</option>
                                        <option v-for="(item, index) in groups" :key="index" v-bind:value="item.id">{{item.groupName}}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-success" @click="onSave">บันทึก</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
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