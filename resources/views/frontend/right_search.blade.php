@verbatim
<div data-ng-app="myApp" data-ng-controller="SearchController">
    <div class="danhmuc_caythuoc">
        <h2 class="rs">DANH LỤC CÂY THUỐC </h2>
        <div class="content">
            <input type="text" data-ng-model="searchMedicine" id="search_caythuoc" placeholder="Tìm kiếm cây thuốc"/>
            <select name="" id="choose_caythuoc" multiple>
                <option value="" data-ng-click="redirect(medicine)" data-ng-repeat="medicine in medicineList | filter: searchMedicine">{{ medicine.title }}</option>
            </select>
            <div class="choose_caythuoc">
                <ul>
                    <li data-ng-click="redirect(medicine)" data-ng-repeat="medicine in medicineList | filter: searchMedicine">{{ medicine.title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="danhmuc_benh">
        <h2 class="rs">TRA CỨU THEO BỆNH </h2>
        <div class="content">
            <input type="text" data-ng-model="searchDisease" id="search_benh"/>
            <select name="" id="choose_benh" multiple>
                <option value="" data-ng-click="redirect(disease)" data-ng-repeat="disease in diseaseList | filter: searchDisease">{{ disease.title }}</option>
            </select>
            <div class="choose_benh">
                <ul>
                    <li  data-ng-click="redirect(disease)" data-ng-repeat="disease in diseaseList | filter: searchDisease">{{ disease.title }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endverbatim