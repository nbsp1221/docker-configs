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
USER root
WORKDIR /usr/lib/code-server/src/browser/pages
RUN sed -i 's/<\/head>/<link rel="stylesheet" href="{{CS_STATIC_BASE}}\/src\/browser\/pages\/fonts.css"><\/head>/g' vscode.html
COPY configs/code-server/fonts.css /usr/lib/code-server/src/browser/pages/fonts.css
COPY configs/media-convert /usr/lib/code-server/src/browser/media
USER coder
WORKDIR ${HOME}/workspaces

# Extensions
RUN code-server --install-extension dbaeumer.vscode-eslint && \
    code-server --install-extension eamodio.gitlens && \
    code-server --install-extension humao.rest-client && \
    code-server --install-extension ms-python.python && \
    code-server --install-extension ms-vscode.cpptools && \
    code-server --install-extension PKief.material-icon-theme && \
    code-server --install-extension streetsidesoftware.code-spell-checker
