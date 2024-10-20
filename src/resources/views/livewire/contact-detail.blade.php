<div>
    @if ($isOpen)
        <div class="modal-wrapper">
            <div class="modal-overlay" wire:click="closeModal"></div>
            <div class="modal">
                <div class="modal-header">
                    <h2>お問い合わせ詳細</h2>
                    <button wire:click="closeModal" class="close-button">×</button>
                </div>
                <div class="modal-body">
                    <p><strong>名前:</strong> {{ $contact->first_name }} {{ $contact->last_name }}</p>
                    <p><strong>性別:</strong> 
                        @if ($contact->gender == 1) 男性
                        @elseif ($contact->gender == 2) 女性
                        @else その他
                        @endif
                    </p>
                    <p><strong>メールアドレス:</strong> {{ $contact->email }}</p>
                    <p><strong>電話番号:</strong> {{ $contact->tel }}</p>
                    <p><strong>お問い合わせ内容:</strong> {{ $contact->detail }}</p>
                </div>
            </div>
        </div>
    @endif
</div>


