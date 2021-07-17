# Dockerfile
# - https://github.com/cdr/code-server/blob/main/ci/release-image/Dockerfile

FROM codercom/code-server:latest
ENV HOME="/home/${USER}"
RUN sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)" "" --unattended && \
    git clone https://github.com/dracula/zsh.git ${HOME}/.dracula/zsh && \
    ln -s ${HOME}/.dracula/zsh/dracula.zsh-theme ${HOME}/.oh-my-zsh/themes/dracula.zsh-theme && \
    git clone https://github.com/zsh-users/zsh-autosuggestions ${ZSH_CUSTOM:-~/.oh-my-zsh/custom}/plugins/zsh-autosuggestions && \
    git clone https://github.com/zsh-users/zsh-syntax-highlighting.git ${ZSH_CUSTOM:-~/.oh-my-zsh/custom}/plugins/zsh-syntax-highlighting
COPY --chown=${USER}:${USER} configs/code-server/config.yaml ${HOME}/.config/code-server/config.yaml
COPY --chown=${USER}:${USER} configs/visual-studio-code/settings.json ${HOME}/.local/share/code-server/User/settings.json
COPY --chown=${USER}:${USER} configs/zsh/.zshrc ${HOME}/.zshrc
COPY --chown=${USER}:${USER} configs/zsh/dracula.zsh-theme ${HOME}/.dracula/zsh/dracula.zsh-theme
WORKDIR ${HOME}/workspaces

# Extensions
RUN code-server --install-extension PKief.material-icon-theme
