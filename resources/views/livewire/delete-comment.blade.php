<x-modal-confirm 
    livewireEventToOpenModal="deleteCommentWasSet"
    eventToCloseModal="commentWasDeleted"
    modalTitle="Delete Comment"
    modalDescription="Are your sure you want to delete this comment? This action
    cannot be undone."
    modalConfirmBtnText="Delete"
    modalBackBtnText="Cancel"
    wireClick="deleteComment"
/>