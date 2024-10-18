<div>
    @if ($isOpen && $contact)
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
    @endif
</div>


<!-- モーダル用のCSS -->
<!--  <style>
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    width: 400px;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.close-button {
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
}
</style> -->
