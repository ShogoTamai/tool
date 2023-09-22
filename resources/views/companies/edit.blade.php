<x-app-layout>
    <div class="bg-gray-200 h-screen">
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/companies/{{ $company->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="name">
                    <h2 class="font-bold">name</h2>
                    <input type="text" name="company[name]" value="{{$company->name}}" class="block w-1/4 border border-gray-400 rounded-md"/>
                    <p class="name__error" style="color:red">{{ $errors->first('company.name') }}</p>
                </div>
                <div class='industry'>
                    <h2 class="font-bold">業界名</h2>
                    <select id="industry" name="company[industry_id]">
                        @foreach ($industries as $industry)
                            <option value="{{ $industry->id }}" @if($industry->id == $company->business->industry->id)selected @endif>{{ $industry->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='business'>
                    <h2 class="font-bold">企業名</h2>
                    <select id="business" name="company[business_id]">
                        <!-- 企業のオプションはJavaScriptで動的に生成します -->
                    </select>
                </div>

                <script>
                    // 業界の選択が変更されるか、ページが読み込まれたときに実行される関数
                    function updateBusinessOptions() {
                        var industry_id = document.getElementById('industry').value;  // 選択された業界のID
                
                        // 企業の選択肢をクリア
                        var business_select = document.getElementById('business');
                        business_select.innerHTML = '';
                
                        // 選択された業界に関連する企業を取得
                        @foreach ($businesses as $business)
                            if ({{ $business->industry_id }} == industry_id) {
                                // 新しいオプション要素を作成して追加
                                var option = document.createElement('option');
                                option.value = "{{ $business->id }}";
                                option.text = "{{ $business->name }}";
                                if ({{ $business->id }} == {{ $company->business->id }}) {
                                    option.selected = true;
                                }
                                business_select.add(option);
                            }
                        @endforeach
                    }
                
                    // 業界の選択が変更されたときに関数を実行
                    document.getElementById('industry').addEventListener('change', updateBusinessOptions);
                
                    // ページが読み込まれたときに関数を実行
                    window.addEventListener('load', updateBusinessOptions);
                </script>
                <div class='upload_url'>
                    <h2 class="font-bold">その他</h2>
                    <label for="attachment">添付url</label>
                    <input type="text" name="company[upload_url]" value="{{$company->upload_url}}" class="block w-1/4 border border-gray-400 rounded-md"/>
                     <p class="upload_url__error" style="color:red">{{ $errors->first('company.upload_url') }}</p>
                </div>
                <div class='status'>
                    <label for="attachment">選考状況</label>
                    <select name="company[status_id]">
                    @foreach ($statuses as $status)
                        <option value = "{{ $status->id }}" @if($status->id == $company->status->id)selected @endif>{{ $status->selection}}</option>
                    @endforeach
                    </select>
                </div>
                <div class='body'>
                    <h2 class="font-bold">備考</h2>
                    <textarea name="company[body]" rows="4" class="block w-1/2 border-gray-400 rounded-md">{{$company->body}}</textarea>
                     <p class="body__error" style="color:red">{{ $errors->first('company.body') }}</p>
                </div>
                <input type="submit" value="保存" class="underline text-blue-500">
            </form>
        </div>
        <div class="footer">
            <a href="/companies/{{$company->business->industry->id}}" class="underline text-black">戻る</a>
        </div>
    </div>
</x-app-layout>